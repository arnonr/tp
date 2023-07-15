<?php

namespace app\controllers;

use Yii;
use app\models\Km;
use app\models\KmSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class KmController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $init = [];

        if(isset($_GET['page'])){
            $page = $_GET['page'];
            $offset = (($page-1) * 8) + 1;
            $limit = 8;
            $init['i'] = $offset;
    
            $query = Km::find()->where([
                'active' => 1,
                'publish' => 1
            ])->orderBy(['km_id' => SORT_DESC]);
    
            $model = $query->offset($offset)->limit($limit)->all();
            if($model){
                return $this->renderPartial('kmpage2', [
                    'model' => $model,
                    'init' => $init
                ]);
            }else{
                throw new \yii\web\NotFoundHttpException();
            }
            exit;
            
        }
    
        $model = Km::find()->where([
            'active' => 1,
        ])->orderBy(['km_id' => SORT_DESC])->limit(8)->all();

        return $this->render('index',[
            'model' => $model,
            'init' => $init,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Km::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
