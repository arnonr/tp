<?php

namespace app\controllers;

use Yii;
use app\models\Portfolio;
use app\models\PortfolioSearch;
use app\models\PortfolioSubProject;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use himiklab\sortablegrid\SortableGridAction;
use app\models\PortfolioPicture;

class PortfolioController extends Controller
{
    public function actions()
    {
        return [
            'sort' => [
                'class' => SortableGridAction::className(),
                'modelName' => Portfolio::className(),
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
                        'actions' => ['index','view','create','update','delete','sort','upload', 'deletegall'],
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
                $model = Portfolio::find()
                    ->where('p_id = :ID',[':ID' => $id])
                    ->one();

                if($_POST["type"] == "publish"){
                    $model->publish = $value;
                    $model->save(false);
                }
            }
            exit();
        }

        $searchModel = new PortfolioSearch();
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
        $model = new Portfolio();
        $picture = new PortfolioPicture();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->p_detail = str_replace('<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>',"",$model->p_detail);

            $model->p_img = Yii::$app->mpic->picsave($model,'p_img','portfolio',1,595,397);
            $model->save(false);

             // Update Gallery
            if(isset($_POST['gallTime'])){
                PortfolioPicture::updateAll(['p_id' => $model->p_id], ['create' => $_POST['gallTime']]);
            }

            Yii::$app->session->setFlash('success', "Created Success");
            return $this->redirect(['index','PortfolioSearch[port_sub_pro_id]' => $model->port_sub_pro_id]);
        }

        $init = [];
        $port_sub_pro_id = $_GET['port_sub_pro_id'];
        if($port_sub_pro_id){
            $sub = PortfolioSubProject::find()->where([
                'port_sub_pro_id' => $port_sub_pro_id
            ])->one();

            $init['year_arr'] = [
                $sub->portfolioProject->portfolioYear->port_year_id => $sub->portfolioProject->portfolioYear->port_year_name
            ];

            $init['port_pro_arr'] = [
                $sub->portfolioProject->port_pro_id =>  $sub->portfolioProject->port_pro_name
            ];

            $init['port_sub_pro_arr'] = [
                $sub->port_sub_pro_id =>  $sub->port_sub_pro_name
            ];
        }

        return $this->render('create', [
            'init' => $init,
            'model' => $model,
            'picture' => $picture
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $picture = new PortfolioPicture();

        $model->p_img_old = $model->p_img;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->p_detail = str_replace('<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>',"",$model->p_detail);
            
            $model->p_img = Yii::$app->mpic->picsave($model,'p_img','portfolio',1,595,397);
            $model->save(false);

            // update Gallery
            if(isset($_POST['gallTime'])){
                PortfolioPicture::updateAll(['p_id' => $model->p_id], ['create' => $_POST['gallTime']]);
            }

            Yii::$app->session->setFlash('success', "Updated Success");
            return $this->redirect(['index','PortfolioSearch[port_sub_pro_id]' => $model->port_sub_pro_id]);
        }

        $init = [];
        $port_sub_pro_id = $model->port_sub_pro_id;
        if($port_sub_pro_id){
            $sub = PortfolioSubProject::find()->where([
                'port_sub_pro_id' => $port_sub_pro_id
            ])->one();

            $init['year_arr'] = [
                $sub->portfolioProject->portfolioYear->port_year_id => $sub->portfolioProject->portfolioYear->port_year_name
            ];

            $init['port_pro_arr'] = [
                $sub->portfolioProject->port_pro_id =>  $sub->portfolioProject->port_pro_name
            ];

            $init['port_sub_pro_arr'] = [
                $sub->port_sub_pro_id =>  $sub->port_sub_pro_name
            ];
        }

        return $this->render('update', [
            'init' => $init,
            'model' => $model,
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
        if (($model = Portfolio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // Gallery
    public function actionUpload()
    {
          $portfolio_picture = new PortfolioPicture();
          $portfolio_picture->p_id = 1;
          $portfolio_picture->port_pic_img = $_FILES['Picture'];
          $portfolio_picture->create = $_POST['gallTime'];
          $portfolio_picture->upload();

          return json_encode($portfolio_picture->update);
    }

    public function actionDeletegall($id)
    {
          $model = PortfolioPicture::findOne($id);
          $model->active = 0;
          $model->save();
          return json_encode($model->p_id);
    }
}
