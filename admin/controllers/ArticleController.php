<?php
namespace app\controllers;

use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\ArticleType;
use yii\helpers\ArrayHelper;

class ArticleController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','view','create','update','delete'],
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
                $model = Article::find()
                    ->where('a_id = :ID',[':ID' => $id])
                    ->one();

                if($_POST["type"] == "publish"){
                    $model->publish = $value;
                    $model->save(false);
                }
            }
            exit();
        }

        $searchModel = new ArticleSearch();
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
        $model = new Article();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->a_detail = str_replace('<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>',"",$model->a_detail);
            
            $model->a_img = Yii::$app->mpic->picsave($model,'a_img','article',1,595,397);
            $model->save(false);

            Yii::$app->session->setFlash('success', "Created Success");
            return $this->redirect(['index','ArticleSearch[a_type_id]' => $model->a_type_id]);
        }

        $model->a_type_id = $_GET['a_type_id'];

        $art_type = ArticleType::find()->where(['a_type_id' => $model->a_type_id])->all();
        $art_type = ArrayHelper::map($art_type,'a_type_id','a_type_name');

        return $this->render('create', [
            'model' => $model,
            'art_type' => $art_type,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // Image old
        $model->a_img_old = $model->a_img;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->a_detail = str_replace('<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>',"",$model->a_detail);

            $model->a_img = Yii::$app->mpic->picsave($model,'a_img','article',1,595,397);
            $model->save(false);

            if($model->a_id == 9){
                Yii::$app->session->setFlash('success', "Updated Success");
                return $this->redirect(['update','id' => 9]);
            }
            Yii::$app->session->setFlash('success', "Updated Success");
            return $this->redirect(['index','ArticleSearch[a_type_id]' => $model->a_type_id]);
        }

        $art_type = ArticleType::find()->where(['a_type_id' => $model->a_type_id])->all();
        $art_type = ArrayHelper::map($art_type,'a_type_id','a_type_name');

        return $this->render('update', [
            'model' => $model,
            'art_type' => $art_type,
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
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
