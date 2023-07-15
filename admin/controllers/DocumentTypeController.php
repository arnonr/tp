<?php
namespace app\controllers;

use Yii;
use app\models\DocumentType;
use app\models\DocumentTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use himiklab\sortablegrid\SortableGridAction;

class DocumentTypeController extends Controller
{
    public function actions()
    {
        return [
            'sort' => [
                'class' => SortableGridAction::className(),
                'modelName' => DocumentType::className(),
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
                        'actions' => ['index','view','create','update','delete','sort','get-document-type','get-parents','get-document-type-sub'],
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
        $searchModel = new DocumentTypeSearch();
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
        $model = new DocumentType();
        $init = [];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Created Success");
            return $this->redirect(['index','DocumentTypeSearch[doc_type_main_id]' => $model->doc_type_main_id]);
        }




        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Updated Success");
            return $this->redirect(['index','DocumentTypeSearch[doc_type_main_id]' => $model->doc_type_main_id]);
        }



        return $this->render('update', [
            'model' => $model,
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
        if (($model = DocumentType::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGetDocumentType() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
             $parents = $_POST['depdrop_parents'];
             if ($parents != null) {

                $doc_type = DocumentType::find()->where([
                    'doc_type_main_id' => $parents[0],
                    'parents' => null,
                    'active' => 1,
                ])->orderby(['order' => SORT_ASC])->all();

                $out = $this->MapData($doc_type,'doc_type_id','doc_type_name');

                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
             }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
     }

    public function actionGetParents() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
             $parents = $_POST['depdrop_parents'];
             if ($parents != null) {

                $doc_type = DocumentType::find()->where([
                    'doc_type_main_id' => $parents[0],
                    'active' => 1,
                    'parents' => null,
                ])->orderby(['order' => SORT_ASC])->all();

                $out = $this->MapData($doc_type,'doc_type_id','doc_type_name');

                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
             }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionGetDocumentTypeSub() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
             $parents = $_POST['depdrop_parents'];
             if ($parents != null) {

                $doc_type = DocumentType::find()->where([
                    'active' => 1,
                    'parents' => $parents[0],
                ])->orderby(['order' => SORT_ASC])->all();

                $out = $this->MapData($doc_type,'doc_type_id','doc_type_name');

                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
             }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    protected function MapData($datas,$fieldId,$fieldName){
        $obj = [];

        foreach ($datas as $key => $value) {
            array_push($obj, ['id'=>$value->{$fieldId},'name'=>$value->{$fieldName}]);
        } 
         return $obj;
     }
}
