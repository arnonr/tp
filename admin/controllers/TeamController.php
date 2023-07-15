<?php
namespace app\controllers;

use Yii;
use app\models\Team;
use app\models\TeamSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Department;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use himiklab\sortablegrid\SortableGridAction;

class TeamController extends Controller
{
    public function actions()
    {
        return [
            'sort' => [
                'class' => SortableGridAction::className(),
                'modelName' => Team::className(),
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
                $model = Team::find()
                    ->where('t_id = :ID',[':ID' => $id])
                    ->one();

                if($_POST["type"] == "publish"){
                    $model->publish = $value;
                    $model->save(false);
                }
            }
            exit();
        }

        $searchModel = new TeamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        $model = new Team();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->t_img = Yii::$app->mpic->picsave($model,'t_img','team',1,387,305);
            $model->save(false);

            Yii::$app->session->setFlash('success', "Created Success");
            return $this->redirect(['index']);
        }

        $dep = Department::find()->where(['active' => 1])->all();
        $dep = ArrayHelper::map($dep,'dep_id','dep_name');

        return $this->render('create', [
            'model' => $model,
            'dep' => $dep,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->t_img_old = $model->t_img;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->t_img = Yii::$app->mpic->picsave($model,'t_img','team',1,387,305);
            $model->save(false);

            Yii::$app->session->setFlash('success', "Updated Success");
            return $this->redirect(['index']);
        }

        $dep = Department::find()->where(['active' => 1])->all();
        $dep = ArrayHelper::map($dep,'dep_id','dep_name');

        return $this->render('create', [
            'model' => $model,
            'dep' => $dep,
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
        if (($model = Team::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
