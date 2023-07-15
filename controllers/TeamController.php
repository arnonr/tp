<?php

namespace app\controllers;

use Yii;
use app\models\Department;
use app\models\Team;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class TeamController extends Controller
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

        $department = Department::find()->where(['active' => 1])->orderBy(['order' => SORT_ASC])->all();

        foreach($department as $item){
            
            $data = Team::find()->where([
                'active' => 1,
                'dep_id' => $item->dep_id,
                'publish' => 1
            ])->orderBy(['order' => SORT_ASC])->all();
                
            $model[$item->dep_id] = [
                'name' => $item->dep_name,
                'data' => $data
            ];
        }

        return $this->render('index',[
            'model' => $model,
            'init' => $init,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Team::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
