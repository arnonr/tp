<?php
namespace app\controllers;

use Yii;
use app\models\Gallery;
use app\models\GallerySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Picture;

class GalleryController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','view','create','update','delete','upload',  'deletegall'],
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

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        // Checkbox
        if(isset($_POST['checkbox'])){
            $id = isset($_POST['id']) ? $_POST['id'] : NULL;
            $value = isset($_POST['value']) ? $_POST['value'] : NULL;
            if($id != NULL){
                $model = Gallery::find()
                    ->where('gall_id = :ID',[':ID' => $id])
                    ->one();

                if($_POST["type"] == "publish"){
                    $model->publish = $value;
                    $model->save(false);
                }
            }
            exit();
        }

        $searchModel = new GallerySearch();
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
        $model = new Gallery();
        $picture = new Picture();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $model->gall_img = Yii::$app->mpic->picsave($model,'gall_img','gallery',1,595,397);
            $model->save(false);

             // Update Gallery
            if(isset($_POST['gallTime'])){
                Picture::updateAll(['gall_id' => $model->gall_id], ['create' => $_POST['gallTime']]);
            }

            Yii::$app->session->setFlash('success', "Created Success");
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'picture' => $picture,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $picture = new Picture();

        $model->gall_img_old = $model->gall_img;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $model->gall_img = Yii::$app->mpic->picsave($model,'gall_img','gallery',1,595,397);
            $model->save(false);

            // update Gallery
            if(isset($_POST['gallTime'])){
                Picture::updateAll(['gall_id' => $model->gall_id], ['create' => $_POST['gallTime']]);
            }

            Yii::$app->session->setFlash('success', "Updated Success");
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'picture' => $picture,
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
        if (($model = Gallery::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUpload()
    {
          $picture = new Picture();
          
          $picture->gall_id = 1;
          $picture->pic_img = $_FILES['Picture'];
          $picture->create = $_POST['gallTime'];
          $picture->upload();

          return json_encode($picture->update);
    }

    public function actionDeletegall($id)
    {
          $model = Picture::findOne($id);
          $model->active = 0;
          $model->save();
          return json_encode($model->gall_id);
    }
}
