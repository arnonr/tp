<?php
namespace app\controllers;

use Yii;
use app\models\News;
use app\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\NewsType;
use yii\helpers\ArrayHelper;
use app\models\Picture;

class NewsController extends Controller
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
                $model = News::find()
                    ->where('n_id = :ID',[':ID' => $id])
                    ->one();

                if($_POST["type"] == "publish"){
                    $model->publish = $value;
                    $model->save(false);
                }
            }
            exit();
        }

        $searchModel = new NewsSearch();
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
        $model = new News();
        $picture = new Picture();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->n_detail = str_replace('<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>',"",$model->n_detail);

            $model->n_img = Yii::$app->mpic->picsave($model,'n_img','news',1,595,397);
            $model->save(false);

            // Update Gallery
            if(isset($_POST['gallTime'])){
                Picture::updateAll(['news_id' => $model->n_id], ['create' => $_POST['gallTime']]);
            }

            Yii::$app->session->setFlash('success', "Created Success");
            return $this->redirect(['index']);
        }

        $news_type = NewsType::find()->where(['active' => 1])->all();
        $news_type = ArrayHelper::map($news_type,'n_type_id','n_type_name');

        return $this->render('create', [
            'model' => $model,
            'news_type' => $news_type,
            'picture' => $picture
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $picture = new Picture();


        $model->n_img_old = $model->n_img;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->n_detail = str_replace('<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>',"",$model->n_detail);
            
            $model->n_img = Yii::$app->mpic->picsave($model,'n_img','news',1,595,397);
            $model->save(false);

            // update Gallery
            if(isset($_POST['gallTime'])){
                Picture::updateAll(['news_id' => $model->n_id], ['create' => $_POST['gallTime']]);
            }

            Yii::$app->session->setFlash('success', "Updated Success");
            return $this->redirect(['index']);
        }

        $news_type = NewsType::find()->where(['active' => 1])->all();
        $news_type = ArrayHelper::map($news_type,'n_type_id','n_type_name');

        return $this->render('update', [
            'model' => $model,
            'news_type' => $news_type,
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
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // Gallery
    public function actionUpload()
    {
          $picture = new Picture();
          $picture->news_id = 1;
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
          return json_encode($model->news_id);
    }
}
