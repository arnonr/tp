<?php
namespace app\controllers;

use Yii;
use app\models\Document;
use app\models\DocumentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\DocumentType;
use yii\helpers\ArrayHelper;
use himiklab\sortablegrid\SortableGridAction;

class DocumentController extends Controller
{
    public function actions()
    {
        return [
            'sort' => [
                'class' => SortableGridAction::className(),
                'modelName' => Document::className(),
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
        $init = [];
        // Checkbox

        if(isset($_POST['checkbox'])){
            $id = isset($_POST['id']) ? $_POST['id'] : NULL;
            $value = isset($_POST['value']) ? $_POST['value'] : NULL;
            if($id != NULL){
                $model = Document::find()
                    ->where('doc_id = :ID',[':ID' => $id])
                    ->one();

                if($_POST["type"] == "publish"){
                    $model->publish = $value;
                    $model->save(false);
                }
            }
            exit();
        }

        $searchModel = new DocumentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'init' => $init,
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
        $model = new Document();

        if ($model->load(Yii::$app->request->post())) {

            $model->save();

            $model->doc_url = Yii::$app->mdoc->docsave($model,'doc_url','document');
            $model->save(false);

            Yii::$app->session->setFlash('success', "Created Success");
            return $this->redirect(['index','DocumentSearch[doc_type_main_id]' => $model->documentType->doc_type_main_id]);
        }

        $model->doc_type_main_id = $_GET['doc_type_main_id'];

        $doc_type = DocumentType::find()->where([
            'active' => 1,
            'doc_type_main_id' => $model->doc_type_main_id,
        ])->all();

        $doc_type = ArrayHelper::map($doc_type,'doc_type_id','doc_type_name');
        $def_doc_type = [ null => "-- Choose Document Type --"];
        $doc_type = $def_doc_type + $doc_type;

        $doc_type_sub = [];

        return $this->render('create', [
            'model' => $model,
            'doc_type' => $doc_type,
            'doc_type_sub' => $doc_type_sub
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // Document Old
        $model->doc_url_old = $model->doc_url;
        $model->doc_type_main_id = $model->documentType->doc_type_main_id;

        if ($model->load(Yii::$app->request->post())) {

            if($model->doc_type_sub_id != ""){
               $model->doc_type_id = $model->doc_type_sub_id;
            }

            $model->save();

            $model->doc_url = Yii::$app->mdoc->docsave($model,'doc_url','document');
            $model->save(false);

            Yii::$app->session->setFlash('success', "Updated Success");
            return $this->redirect(['index','DocumentSearch[doc_type_main_id]' => $model->documentType->doc_type_main_id]);
        }

        $doc_type = DocumentType::find()->where([
            'active' => 1,
            'doc_type_main_id' => $model->doc_type_main_id,
        ])->all();

        $data = DocumentType::find()->where(['doc_type_id' => $model->doc_type_id])->one();

        $doc_type_sub = [];

        $doc_type_sub = DocumentType::find()->where([
            'active' => 1,
            'doc_type_main_id' => $data->doc_type_main_id
        ]);

        //  ไม่เลือกเอกสารย่อย
        $doc_type_sub = $doc_type_sub->all();
       

        $doc_type_sub = ArrayHelper::map($doc_type_sub,'doc_type_id','doc_type_name');
        $def_doc_type_sub = [ null => "-- Choose Document Type Sub --"];
        $doc_type_sub = $def_doc_type_sub + $doc_type_sub;
      

        $doc_type = ArrayHelper::map($doc_type,'doc_type_id','doc_type_name');

        $def_doc_type = [ null => "-- Choose Document Type --"];
        $doc_type = $def_doc_type + $doc_type;


        return $this->render('update', [
            'model' => $model,
            'doc_type' => $doc_type,
            'doc_type_sub' => $doc_type_sub
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
        if (($model = Document::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }





}
