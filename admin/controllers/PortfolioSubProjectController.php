<?php
namespace app\controllers;

use Yii;
use app\models\PortfolioSubProject;
use app\models\PortfolioSubProjectSearch;
use app\models\PortfolioProject;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\PortfolioYear;
use yii\helpers\ArrayHelper;
use himiklab\sortablegrid\SortableGridAction;


class PortfolioSubProjectController extends Controller
{
    public function actions()
    {
        return [
            'sort' => [
                'class' => SortableGridAction::className(),
                'modelName' => PortfolioSubProject::className(),
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
                        'actions' => ['index','view','create','update','delete','sort'],
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
                $model = PortfolioSubProject::find()
                    ->where('port_pro_id = :ID',[':ID' => $id])
                    ->one();

                if($_POST["type"] == "publish"){
                    $model->publish = $value;
                    $model->save(false);
                }
            }
            exit();
        }



        $searchModel = new PortfolioSubProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $port_pro_id = $_GET['PortfolioSubProjectSearch']['port_pro_id'];
        if($port_pro_id){
            $init['port_pro'] = ArrayHelper::map(PortfolioProject::find()->where([
                'port_pro_id' => $port_pro_id
            ])->one(),'port_pro_id','port_pro_name');
        }



        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'init' => $init,
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
        $model = new PortfolioSubProject();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            // $model->p_detail = str_replace('<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>',"",$model->p_detail);

            // $model->p_img = Yii::$app->mpic->picsave($model,'p_img','portfolio',1,595,397);
            // $model->save(false);

            Yii::$app->session->setFlash('success', "Created Success");
            return $this->redirect(['index','PortfolioSubProjectSearch[port_pro_id]' => $model->port_pro_id]);
        }


        $port_pro_id = $_GET['port_pro_id'];

        if($port_pro_id){
            $init['port_pro'] = ArrayHelper::map(PortfolioProject::find()->where([
                'port_pro_id' => $port_pro_id
            ])->all(),'port_pro_id','port_pro_name');
        }

        return $this->render('create', [
            'model' => $model,
            'init' => $init
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            // $model->p_detail = str_replace('<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>',"",$model->p_detail);
            
            // $model->p_img = Yii::$app->mpic->picsave($model,'p_img','portfolio',1,595,397);
            // $model->save(false);

            Yii::$app->session->setFlash('success', "Updated Success");
            return $this->redirect(['index','PortfolioSubProjectSearch[port_pro_id]' => $model->port_pro_id]);
        }

        
      
        $init['port_pro'] = ArrayHelper::map(PortfolioProject::find()->where([
            'port_pro_id' => $model->port_pro_id
        ])->all(),'port_pro_id','port_pro_name');
        

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
        if (($model = PortfolioSubProject::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
