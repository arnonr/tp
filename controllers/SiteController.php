<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\News;
use app\models\NewsType;
use app\models\NewsAnnouce;
use app\models\Slide;
use app\models\ProjectLogo;
use app\models\TgdePortfolio;
use app\models\Article;
use app\models\ArticleType;

class SiteController extends Controller
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

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $init = [];

        // News
        $init['news'] = [];
        $init['newsType'] = NewsType::find()->where([
            'active' => 1,
        ])->orderBy(['order' => SORT_ASC])->all();
        
        $news['all'] = News::find()->where([
            'active' => 1,
            'publish' => 1
        ])->orderBy(['n_id' => SORT_DESC])->limit(8)->all();
        
        foreach($init['newsType'] as $item){
            $news[$item->tag] = News::find()->where([
                'active' => 1,
                'publish' => 1
            ])->andWhere(['n_type_id' => $item->n_type_id])->orderBy(['n_id' => SORT_DESC])->limit(8)->all();
        }

        $n_id = [];
        foreach($news as $items){
            foreach($items as $item){
                if(!in_array($item->n_id, $n_id)){
                    array_push($init['news'], $item);
                    array_push($n_id, $item->n_id);
                }
            }
        }

        // NewsAnnouce
        $init['newsAnnouce'] = NewsAnnouce::find()->where([
            'active' => 1,
            'publish' => 1
        ])->orderBy(['an_date' => SORT_DESC, 'an_id' => SORT_DESC])->limit(9)->all();

        // Slide
        $init['slide'] = Slide::find()->where([
            'active' => 1,
            'publish' => 1
        ])->orderBy(['order' => SORT_ASC])->all();

        // Project
        $init['projectLogo'] = ProjectLogo::find()->where([
            'active' => 1,
            'publish' => 1
        ])->orderBy(['order' => SORT_ASC])->all();

        $init['tgdePortfolio'] = TgdePortfolio::find()->where([])->orderBy(['tp_id' => SORT_DESC])->limit(4)->all();
    
        return $this->render('index', [
            'init' => $init,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionTraining()
    {
        return $this->render('training');
    }

    // public function actionContact()
    // {
    //     $model = new ContactForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
    //         Yii::$app->session->setFlash('contactFormSubmitted');

    //         return $this->refresh();
    //     }
    //     return $this->render('contact', [
    //         'model' => $model,
    //     ]);
    // }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionResearch()
    {
        $init = [];
        $model = Article::findOne(27);

        return $this->render('research', [
            'model' => $model,
            'init' => $init
        ]);

    }

    public function actionCoopday()
    {
        $this->layout = false;
        return $this->render('coopday',[
        ]);
    }

    public function actionYoutubeLive()
    {
        // $this->layout = false;
        $this->enableCsrfValidation = false;
        $init = [];
        
      
        return $this->render('youtube-live', [
            'init' => $init,
        ]);
    }
}
