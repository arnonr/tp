<?php
namespace app\controllers;

use Yii;
use app\models\Annouce;
use app\models\AnnouceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class AnnouceController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','view','create','update','delete'],
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
                $model = Annouce::find()
                    ->where('an_id = :ID',[':ID' => $id])
                    ->one();

                if($_POST["type"] == "publish"){
                    $model->publish = $value;
                    $model->save(false);
                }
            }
            exit();
        }

        $searchModel = new AnnouceSearch();
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
        $model = new Annouce();
        $init = [];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $model->an_url = Yii::$app->mdoc->docsave($model,'an_url','annouce');
            $model->save(false);

            Yii::$app->session->setFlash('success', "Created Success");
            return $this->redirect(['index']);
        }

        $init['init_an_date'] = date('Y-m-d');

        return $this->render('create', [
            'model' => $model,
            'init' => $init
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $init = [];

        // Annouce Old
        $model->an_url_old = $model->an_url;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->an_url = Yii::$app->mdoc->docsave($model,'an_url','document');
            $model->save(false);

            Yii::$app->session->setFlash('success', "Updated Success");
            return $this->redirect(['index']);
        }

        $init['init_an_date'] = ($model->an_date != null) ? Yii::$app->formatter->asDate($model->an_date,'php:Y-m-d') :date('Y-m-d');
        $model->an_date = Yii::$app->formatter->asDate($model->an_date,'php:Y-m-d');

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
        if (($model = Annouce::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
