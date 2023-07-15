<?php
namespace app\controllers;

use Yii;
use yii\helpers\Url;
use app\models\Authassignment;
use app\models\UserSearch;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class AssignmentController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','update'],
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
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdate()
    {
        $auth = Authassignment::find()->where(['user_id' => $_POST['username']])->one();

        if($auth){
            $auth->item_name = $_POST['item_name'];
            $auth->save();
        }else{
            $auth = new Authassignment;
            $auth->item_name = $_POST['item_name'];
            $auth->user_id = $_POST['username'];
            $auth->save();
        }
       
        
        echo "success";
    }
}
