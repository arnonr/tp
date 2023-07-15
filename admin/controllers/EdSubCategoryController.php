<?php
namespace app\controllers;

use Yii;
use app\models\EdSubCategory;
use app\models\EdSubCategorySearch;
use app\models\EdCategory;
use app\models\EdType;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use himiklab\sortablegrid\SortableGridAction;

class EdSubCategoryController extends Controller
{
    public function actions()
    {
        return [
            'sort' => [
                'class' => SortableGridAction::className(),
                'modelName' => EdSubCategory::className(),
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
                $model = EdSubCategory::find()
                    ->where('ed_sub_cat_id = :ID',[':ID' => $id])
                    ->one();

                if($_POST["type"] == "publish"){
                    $model->publish = $value;
                    $model->save(false);
                }
            }
            exit();
        }

        $searchModel = new EdSubCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(isset($_GET['ed_cat_id'])){
            $ed_cat = EdCategory::findOne($_GET['ed_cat_id']);
            $init['ed_type_id'] = $ed_cat->ed_type_id;
        }else{
            $init['ed_type_id'] = 1;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'init' => $init
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
        $model = new EdSubCategory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('success', "Created Success");


            return $this->redirect(['index','EdSubCategorySearch[ed_cat_id]' => $model->ed_cat_id]);
        }

        $init = [];

        $init['education_type_arr'] = EdType::find()->where(['active' => 1])->all();
        $init['education_type_arr'] = ArrayHelper::map($init['education_type_arr'],'ed_type_id','ed_type_name');

        $init['education_category_arr'] = EdCategory::find()->where(['active' => 1])->all();
        $init['education_category_arr'] = ArrayHelper::map($init['education_category_arr'],'ed_cat_id','ed_cat_name');



        return $this->render('create', [
            'model' => $model,
            'init' => $init
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Updated Success");
            return $this->redirect(['index','EdSubCategorySearch[ed_cat_id]' => $model->ed_cat_id]);
        }

        $init['education_category_arr'] = EdCategory::find()->where(['active' => 1])->all();
        $init['education_category_arr'] = ArrayHelper::map($init['education_category_arr'],'ed_cat_id','ed_cat_name');

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
        if (($model = EdSubCategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
