<?php

namespace app\controllers;

use Yii;
use app\models\About;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class AboutController extends Controller
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

    public function actionIndex($id)
    {
        $init = [];
    
        $model = $this->findModel($id);

        return $this->render('index',[
            'model' => $model,
            'init' => $init,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = About::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
