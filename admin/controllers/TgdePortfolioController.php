<?php
namespace app\controllers;

use Yii;
use app\models\TgdePortfolio;
use app\models\TgdePortfolioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\TgdePortfolioYear;
use yii\helpers\ArrayHelper;
use app\models\TgdePicture;

class TgdePortfolioController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','view','create','update','delete','upload', 'deletegall'],
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
                $model = TgdePortfolio::find()
                    ->where('tp_id = :ID',[':ID' => $id])
                    ->one();

                if($_POST["type"] == "publish"){
                    $model->publish = $value;
                    $model->save(false);
                }
            }
            exit();
        }

        $searchModel = new TgdePortfolioSearch();
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
        $model = new TgdePortfolio();
        $picture = new TgdePicture();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->tp_detail = str_replace('<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>',"",$model->tp_detail);

            $model->tp_img = Yii::$app->mpic->picsave($model,'tp_img','tgde-portfolio',1,595,397);
            $model->save(false);

            // Update Gallery
            if(isset($_POST['gallTime'])){
                TgdePicture::updateAll(['tp_id' => $model->tp_id], ['create' => $_POST['gallTime']]);
            }

            Yii::$app->session->setFlash('success', "Created Success");
            return $this->redirect(['index']);
        }

        $tp_year = TgdePortfolioYear::find()->where(['active' => 1])->orderBy(['tp_year_id' => SORT_DESC])->all();
        $tp_year = ArrayHelper::map($tp_year,'tp_year_id','tp_year_name');

        return $this->render('create', [
            'model' => $model,
            'tp_year' => $tp_year,
            'picture' => $picture
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $picture = new TgdePicture();


        $model->tp_img_old = $model->tp_img;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->tp_detail = str_replace('<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>',"",$model->tp_detail);
            
            $model->tp_img = Yii::$app->mpic->picsave($model,'tp_img','tgde-portfolio',1,595,397);
            $model->save(false);

            // update Gallery
            if(isset($_POST['gallTime'])){
                TgdePicture::updateAll(['tp_id' => $model->tp_id], ['create' => $_POST['gallTime']]);
            }

            Yii::$app->session->setFlash('success', "Updated Success");
            return $this->redirect(['index']);
        }

        $tp_year = TgdePortfolioYear::find()->where(['active' => 1])->orderBy(['tp_year_id' => SORT_DESC])->all();
        $tp_year = ArrayHelper::map($tp_year,'tp_year_id','tp_year_name');

        return $this->render('update', [
            'model' => $model,
            'tp_year' => $tp_year,
            'picture' => $picture
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
        if (($model = TgdePortfolio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // Gallery
    public function actionUpload()
    {
          $picture = new TgdePicture();
          $picture->tp_id = 1;
          $picture->pic_img = $_FILES['TgdePicture'];
          $picture->create = $_POST['gallTime'];
          $picture->upload();

          return json_encode($picture->update);
    }

    public function actionDeletegall($id)
    {
          $model = TgdePicture::findOne($id);
          $model->active = 0;
          $model->save();
          return json_encode($model->tp_id);
    }
}
