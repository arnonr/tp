<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\TgdePortfolio;
use app\models\TgdePortfolioYear;
use app\models\TgdePicture;

class TgdePortfolioController extends Controller
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

    public function actionIndex($tp_year_id = null)
    {
        $init = [];
        $init['tp_year_id'] = $tp_year_id;

            $init['tp_year_link'] = '';

            $model = TgdePortfolio::find()->where([
                'active' => 1,
                'publish' => 1
            ])->orderBy(['tp_id' => SORT_DESC])->limit(8); 

            if($tp_year_id == null){
                $tp_year_id = 2;
            }

            $init['tp_year_id'] = $tp_year_id;

            $init['tgdePortfolioYearSelect'] = TgdePortfolioYear::find()->where([
                'tp_year_id' => $tp_year_id
            ])->one();

            $init['tp_type_link'] = 'tp_year_id='.$tp_year_id;
            $model = $model->andWhere([
                'tp_year_id' => $tp_year_id
            ]);

            $model = $model->all();

            $init['tgdePortfolioYear'] = TgdePortfolioYear::find()->where([
                'active' => 1
            ])->orderBy(['tp_year_id' => SORT_DESC])->all();

            return $this->render('index',[
                'init' => $init,
                'model' => $model
            ]);
    }

    public function actionView($id)
    {
        $init = [];
        $model = $this->findModel($id);

        // $init['lastestTgdePortfolio'] = TgdePortfolio::find()->where([
        //     'active' => 1,
        //     'publish' => 1
        // ])->andWhere(['=','tp_year_id',$model->tp_year_id])
        // ->andWhere(['!=','tp_id',$model->tp_id])
        // ->orderBy(['tp_id'=> SORT_DESC])->limit(5)->all();

        $init['prevTgdePortfolio'] = TgdePortfolio::find()->where([
            'active' => 1,
            'publish' => 1
        ])->andWhere(['=','tp_year_id',$model->tp_year_id])
        ->andWhere(['<','tp_id',$model->tp_id])
        ->orderBy(['tp_id'=> SORT_DESC])->one();

        $init['nextTgdePortfolio'] = TgdePortfolio::find()->where([
            'active' => 1,
            'publish' => 1
        ])->andWhere(['=','tp_year_id',$model->tp_year_id])
        ->andWhere(['>','tp_id',$model->tp_id])
        ->orderBy(['tp_id'=> SORT_ASC])->one();

        $init['picture'] = TgdePicture::find()->where(['active' => 1, 'tp_id' => $model->tp_id])->all();
        $init['is_gallery'] = false;
        if($init['picture']){
            $init['is_gallery'] = true;
        }
       

        $this->addviews($id);
        return $this->render('view', [
            'model' => $model,
            'init' => $init
        ]);
    }

    protected function findModel($id)
    {
        if (($model = TgdePortfolio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function addviews($id)
    {
        $model = TgdePortfolio::findOne($id);
        $model->views = $model->views + 1;
        $model->save();
    }

    public function actionPortfolioInfiniteScroll2LoadTgdePortfolio()
    {
        $tp_year_id = (isset($_GET['tp_year_id'])) ? $_GET['tp_year_id'] : null;
        $page = $_GET['page'];
        $offset = (($page-1) * 8) + 1;
        $limit = 8;

        $query = TgdePortfolio::find()->where([
            'active' => 1,
            'publish' => 1
        ]);

        if($tp_year_id != null){
            $query = $query->andWhere([
                'tp_year_id' => $tp_year_id
            ]);
        }

        $model = $query->offset($offset)->orderBy(['tp_year_id' => SORT_DESC])->limit($limit)->all();
      
        return $this->renderPartial('page2', [
            'model' => $model
        ]);
    }

    public function actionPortfolioInfiniteScroll2LoadArticle2()
    {
        $a_type_id = (isset($_GET['a_type_id'])) ? $_GET['a_type_id'] : null;
        $a_type_sub_id = (isset($_GET['a_type_sub_id'])) ? $_GET['a_type_sub_id'] : null;
        $page = $_GET['page'];
        $offset = (($page-1) * 8) + 1;
        $limit = 8;

        $query = Article::find()->where([
            'active' => 1,
            'publish' => 1
        ]);

        if($a_type_id != null){
            $query = $query->andWhere([
                'a_type_id' => $a_type_id,
                'a_type_sub_id' => $a_type_sub_id
            ]);
        }

        $model = $query->offset($offset)->orderBy(['a_id' => SORT_DESC])->limit($limit)->all();
      
        return $this->renderPartial('page2', [
            'model' => $model
        ]);
    }
    
    
}
