<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Article;
use app\models\ArticleType;
use app\models\ArticleTypeSub;
class ArticleController extends Controller
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

    public function actionIndex($a_type_id = null, $a_type_sub_id = null)
    {
        $init = [];
        $init['a_type_id'] = $a_type_id;
        $init['a_type_sub__id'] = $a_type_sub_id;
        if($a_type_id == 3){
            if($init['a_type_sub__id'] == null){
                $init['a_type_sub__id'] = 1;
            }
            $init['articleTypeSub'] = ArticleTypeSub::find()->where([
                'active' => 1,
            ])->andWhere(['a_type_id' => $a_type_id])->all();

            $init['articleTypeSubSelect'] = ArticleTypeSub::find()->where([
                'a_type_sub_id' => $init['a_type_sub__id']
            ])->one();
            
            $init['a_type_link'] = '';
            $init['a_type_sub_link'] = '';

            $model = Article::find()->where([
                'active' => 1,
                'publish' => 1
            ])->orderBy(['a_id' => 'SORT_DESC'])->limit(8); 

            if($a_type_id != null){
                $init['articleTypeSelect'] = ArticleType::find()->where([
                    'a_type_id' => $a_type_id
                ])->one();

                $init['a_type_link'] = 'a_type_id='.$a_type_id;
                $init['a_type_sub_link'] = 'a_type_sub_id='.$a_type_sub_id;
                $model = $model->andWhere([
                    'a_type_id' => $a_type_id
                ])->andWhere([
                    'a_type_sub_id' => $init['a_type_sub__id']
                ]);
            }

            $model = $model->all();

            return $this->render('mediaservice',[
                'init' => $init,
                'model' => $model
            ]);

        }else{
            $model = Article::find()->where([
                'active' => 1,
                'publish' => 1
            ])->orderBy(['a_id' => SORT_DESC])->limit(8); 

            $init['a_type_link'] = '';
            
            if($a_type_id != null){
                $init['articleTypeSelect'] = ArticleType::find()->where([
                    'a_type_id' => $a_type_id
                ])->one();

                $init['a_type_link'] = 'a_type_id='.$a_type_id;
                $model = $model->andWhere([
                    'a_type_id' => $a_type_id
                ]);
            }

            $model = $model->all();

            return $this->render('index',[
                'init' => $init,
                'model' => $model
            ]);
        }
        
    }

    public function actionView($id)
    {
        $init = [];
        $model = $this->findModel($id);

        if(($model->a_id == 9) || ($model->a_id == 13) || ($model->a_id == 28)){
            return $this->render('calendar', [
                'model' => $model,
                'init' => $init
            ]);
        }

        if($model->a_id == 2){
            return $this->render('aboutcoop', [
                'model' => $model,
                'init' => $init
            ]);
        }

        $init['lastestArticle'] = Article::find()->where([
            'active' => 1,
            'publish' => 1
        ])->andWhere(['=','a_type_id',$model->a_type_id])
        ->andWhere(['!=','a_id',$model->a_id])
        ->orderBy(['a_id'=> SORT_DESC])->limit(5)->all();

        $init['prevArticle'] = Article::find()->where([
            'active' => 1,
            'publish' => 1
        ])->andWhere(['=','a_type_id',$model->a_type_id])
        ->andWhere(['<','a_id',$model->a_id])
        ->orderBy(['a_id'=> SORT_DESC])->one();

        $init['nextArticle'] = Article::find()->where([
            'active' => 1,
            'publish' => 1
        ])->andWhere(['=','a_type_id',$model->a_type_id])
        ->andWhere(['>','a_id',$model->a_id])
        ->orderBy(['a_id'=> SORT_ASC])->one();

        $this->addviews($id);
        return $this->render('view', [
            'model' => $model,
            'init' => $init
        ]);
    }



    public function actionMsteams()
    {
        $init = [];

        $init['lastestArticle'] = Article::find()->where([
            'active' => 1,
            'publish' => 1
        ])->andWhere(['=','a_type_id', 7])
        // ->andWhere(['!=','a_id',$model->a_id])
        ->orderBy(['a_id'=> SORT_DESC])->limit(5)->all();

        $init['prevArticle'] = Article::find()->where([
            'active' => 1,
            'publish' => 1
        ])->andWhere(['=','a_type_id', 7])
        // ->andWhere(['<','a_id',$model->a_id])
        ->orderBy(['a_id'=> SORT_DESC])->one();

        $init['nextArticle'] = Article::find()->where([
            'active' => 1,
            'publish' => 1
        ])->andWhere(['=','a_type_id', 7])
        // ->andWhere(['>','a_id',$model->a_id])
        ->orderBy(['a_id'=> SORT_ASC])->one();
      
        return $this->render('msteams', [
            'init' => $init
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function addviews($id)
    {
        $model = Article::findOne($id);
        $model->views = $model->views + 1;
        $model->save();
    }

    public function actionPortfolioInfiniteScroll2LoadArticle()
    {
        $a_type_id = (isset($_GET['a_type_id'])) ? $_GET['a_type_id'] : null;
        $page = $_GET['page'];
        $offset = (($page-1) * 8) + 1;
        $limit = 8;

        $query = Article::find()->where([
            'active' => 1,
            'publish' => 1
        ]);

        if($a_type_id != null){
            $query = $query->andWhere([
                'a_type_id' => $a_type_id
            ]);
        }

        $model = $query->offset($offset)->orderBy(['a_id' => SORT_DESC])->limit($limit)->all();
      
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

    public function actionQa($a_type_id = 7)
    {
        $init = [];
        $init['a_type_id'] = 7;
   
        $model = Article::find()->where([
            'active' => 1,
            'publish' => 1
        ])->orderBy(['a_id' => SORT_DESC])->limit(8); 

        $init['a_type_link'] = '';
        
        if($a_type_id != null){
            $init['articleTypeSelect'] = ArticleType::find()->where([
                'a_type_id' => $a_type_id
            ])->one();

            $init['a_type_link'] = 'a_type_id='.$a_type_id;
            $model = $model->andWhere([
                'a_type_id' => $a_type_id
            ]);
        }

        $model = $model->all();

        return $this->render('quality',[
            'init' => $init,
            'model' => $model
        ]);
        
        
    }
    
    
}
