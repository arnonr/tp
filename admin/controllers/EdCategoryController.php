<?php
namespace app\controllers;

use Yii;
use app\models\EdCategory;
use app\models\EdCategorySearch;
use app\models\EdType;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use himiklab\sortablegrid\SortableGridAction;

class EdCategoryController extends Controller
{
    public function actions()
    {
        return [
            'sort' => [
                'class' => SortableGridAction::className(),
                'modelName' => EdCategory::className(),
            ],
        ];
    }


    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','view','create','sort','update','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function(){
                            if(Yii::$app->user->isGuest){
                                return false;
                            }else{
                                return true;
                            }
                        }
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        // Checkbox
        if(isset($_POST['checkbox'])){
            $id = isset($_POST['id']) ? $_POST['id'] : NULL;
            $value = isset($_POST['value']) ? $_POST['value'] : NULL;
            if($id != NULL){
                $model = EdCategory::find()
                    ->where('ed_cat_id = :ID',[':ID' => $id])
                    ->one();

                if($_POST["type"] == "publish"){
                    $model->publish = $value;
                    $model->save(false);
                }
            }
            exit();
        }

        $searchModel = new EdCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new EdCategory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->ed_cat_img = Yii::$app->mpic->picsave($model,'ed_cat_img','education',1,595,397);
            $model->save(false);

            Yii::$app->session->setFlash('success', "Created Success");
            return $this->redirect(['index','EdCategorySearch[ed_type_id]'=> $model->ed_type_id]);
        }

        $init = [];

        $init['education_type_arr'] = ArrayHelper::map(EdType::find()->where(['active' => 1])->all(),'ed_type_id','ed_type_name');

        return $this->render('create', [
            'model' => $model,
            'init' => $init
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // Image old
        $model->ed_cat_img_old = $model->ed_cat_img;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->ed_cat_img = Yii::$app->mpic->picsave($model,'ed_cat_img','education',1,595,397);
            $model->save(false);

            Yii::$app->session->setFlash('success', "Updated Success");
            return $this->redirect(['index','EdCategorySearch[ed_type_id]'=> $model->ed_type_id]);
        }

        $init['education_type_arr'] = EdType::find()->where(['active' => 1])->all();
        $init['education_type_arr'] = ArrayHelper::map($init['education_type_arr'],'ed_type_id','ed_type_name');

        return $this->render('update', [
            'model' => $model,
            'init' => $init
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->active = 0;
        $model->save();

        return  "success";
    }
    
    protected function findModel($id)
    {
        if (($model = EdCategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
