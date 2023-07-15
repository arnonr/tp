<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\News;
use app\models\NewsType;
use app\models\NewsAnnouce;
use app\models\Picture;
class NewsController extends Controller
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

    public function actionIndex($n_type_id = null)
    {
        $init = [];
        $init['n_type_id'] = $n_type_id;

        // News
        $init['newsType'] = NewsType::find()->where([
            'active' => 1,
        ])->orderBy(['order' => SORT_ASC])->all();
        
        $model = News::find()->where([
            'active' => 1,
            'publish' => 1
        ])->orderBy(['n_id' => SORT_DESC])->limit(8);

        $init['n_type_link'] = '';
        
        if($n_type_id != null){
            $init['newsTypeSelect'] = NewsType::find()->where([
                'n_type_id' => $n_type_id
            ])->one();

            $init['n_type_link'] = 'n_type_id='.$n_type_id;
            
            $model = $model->andWhere([
                'n_type_id' => $n_type_id
            ]);
        }

        $model = $model->all();

        

        return $this->render('index',[
            'init' => $init,
            'model' => $model
        ]);
    }

    public function actionView($id)
    {
        $init = [];
        $model = $this->findModel($id);

        $init['lastestNews'] = News::find()->where([
            'active' => 1,
            'publish' => 1
        ])->andWhere(['=','n_type_id',$model->n_type_id])
        ->andWhere(['!=','n_id',$model->n_id])
        ->orderBy(['n_id'=> SORT_DESC])->limit(5)->all();

        $init['prevNews'] = News::find()->where([
            'active' => 1,
            'publish' => 1
        ])->andWhere(['=','n_type_id',$model->n_type_id])
        ->andWhere(['<','n_id',$model->n_id])
        ->orderBy(['n_id'=> SORT_DESC])->one();

        $init['nextNews'] = News::find()->where([
            'active' => 1,
            'publish' => 1
        ])->andWhere(['=','n_type_id',$model->n_type_id])
        ->andWhere(['>','n_id',$model->n_id])
        ->orderBy(['n_id'=> SORT_ASC])->one();

        $init['picture'] = Picture::find()->where(['active' => 1, 'news_id' => $model->n_id])->all();
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
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function addviews($id)
    {
        $model = News::findOne($id);
        $model->views = $model->views + 1;
        $model->save();
    }
    public function actionPortfolioInfiniteScroll2LoadNews()
    {
        $n_type_id = (isset($_GET['n_type_id'])) ? $_GET['n_type_id'] : null;
        $page = $_GET['page'];
        $offset = (($page-1) * 8) + 1;
        $limit = 8;

        $query = News::find()->where([
            'active' => 1,
            'publish' => 1
        ])->orderBy(['n_id' => SORT_DESC]);

        if($n_type_id != null){
            $query = $query->andWhere([
                'n_type_id' => $n_type_id
            ]);
        }

        $model = $query->offset($offset)->limit($limit)->all();

        return $this->renderPartial('page2', [
            'model' => $model
        ]);
    }
    
    // Annouce
    public function actionAnnouce()
    {
        $init = [];

        if(isset($_GET['page'])){
            $page = $_GET['page'];
            $offset = (($page-1) * 8) + 1;
            $limit = 8;
            $init['i'] = $offset;
    
            $query = NewsAnnouce::find()->where([
                'active' => 1,
                'publish' => 1
            ])->orderBy(['an_date' => SORT_DESC, 'an_id' => SORT_DESC]);
    
            $model = $query->offset($offset)->limit($limit)->all();
            if($model){
                return $this->renderPartial('annoucepage2', [
                    'model' => $model,
                    'init' => $init
                ]);
            }else{
                throw new \yii\web\NotFoundHttpException();
            }
            exit;
            
        }
    
        $model = NewsAnnouce::find()->where([
            'active' => 1,
        ])->orderBy(['an_date' => SORT_DESC, 'an_id' => SORT_DESC])->limit(8)->all();

        return $this->render('annouce',[
            'model' => $model,
            'init' => $init,
        ]);
    }
    
}
