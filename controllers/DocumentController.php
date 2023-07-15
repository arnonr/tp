<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\DocumentType;
use app\models\Document;

class DocumentController extends Controller
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

    public function actionIndex($doc_type_main_id, $doc_type_id = null)
    {
        $init = [];

        $init['docTypeMainId'] = $doc_type_main_id;
        $init['docTypeId'] = $doc_type_id;

        $documentMain = [
            1 => 'สำนักงาน',
            2 => 'สหกิจศึกษา',
            3 => 'พัฒนาสื่ออิเล็กทรอนิกส์',
        ];

        $init['documentMain'] = $documentMain[$init['docTypeMainId']];

        $docType = DocumentType::find()->where([
            'active' => 1, 
            'doc_type_main_id' => $init['docTypeMainId'],
        ])->orderBy(['order' => SORT_ASC])->all();

        $document = [];

        foreach($docType as $item){
            $data = Document::find()->where([
                'active' => 1, 
                'publish' => 1,
                'doc_type_id' => $item->doc_type_id,
            ])->orderBy(['order' => SORT_ASC])->all();

            $document[$item->doc_type_id] = [
                'name' => $item->doc_type_name,
                'data' => $data
            ];
        }

        return $this->render('index',[
            'init' => $init,
            'document' => $document
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Document::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAddviews()
    {
        $model = Document::findOne($_POST['id']);
        $model->views = $model->views + 1;
        $model->save();
    }
}
