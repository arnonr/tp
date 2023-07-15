<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\PortfolioSubProject;
use app\models\PortfolioProject;
use app\models\PortfolioYear;
use app\models\Portfolio;
use yii\helpers\ArrayHelper;
use app\models\PortfolioPicture;

class ProjectController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex($port_year_id = null)
    {
        $port_project = PortfolioProject::find()->where([
            'active' => 1, 
            'port_year_id' => $port_year_id,
        ])->orderBy(['order' => SORT_ASC])->all();

        $init['port_year'] =PortfolioYear::find()->where([
            'active' => 1])->orderBy(['order' => SORT_ASC])->all();

        return $this->render('index',[
            'port_project' => $port_project,
            'port_year_id' => $port_year_id,
            'init' => $init
        ]);
    }

    public function actionView($id)
    {
        $popular = Document::find()->where(['active' => 1, 'publish' => 1])->orderBy(['views' => SORT_DESC,'a_id' => SORT_DESC])->limit(5)->all();

        $port = Portfolio::find()->where(['active' => 1, 'publish' => 1])->orderBy(['p_id' => SORT_DESC])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'popular' => $popular,
            'port' => $port,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Document::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAddviews()
    {
        $model = Document::findOne($_POST['id']);
        $model->views = $model->views + 1;
        $model->save();
    }

    public function actionPortfolio($port_sub_pro_id = null)
    {
        $init = [];
        $portfolio = Portfolio::find()->where([
            'active' => 1, 
            'port_sub_pro_id' => $port_sub_pro_id,
        ])->orderBy(['order' => SORT_ASC])->all();


        $init['port_sub_project'] = PortfolioSubProject::find()->where([
            'active' => 1,
            'port_sub_pro_id' => $port_sub_pro_id])->one();

        $init['port_project'] = PortfolioProject::find()->where([
            'active' => 1,'port_pro_id' => $init['port_sub_project']->port_pro_id])->one();

        $init['port_year'] =PortfolioYear::find()->where([
            'active' => 1,'port_year_id' => $init['port_sub_project']->portfolioProject->port_year_id])->one();

        return $this->render('portfolio',[
            'portfolio' => $portfolio,
            'init' => $init
        ]);
    }

    public function actionLightbox(){
        $p_id = $_POST['pID'];

        $portfolioPicture = PortfolioPicture::find()->where(['p_id' => $p_id,'active' => 1])->all();



        if($portfolioPicture){
            $data = [];
            foreach ($portfolioPicture as $pp) {
                array_push($data, $pp->port_pic_img);
            }
            return json_encode($data);
        }else{
           return null;
        }
    }
}
