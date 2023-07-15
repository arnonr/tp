<?php

namespace app\controllers;

use app\models\Newsapi;
use yii\filters\ContentNegotiator;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\imagine\Image;

class NewsapiController extends ActiveController
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            [
                'class' => ContentNegotiator::className(),
                'only' => ['index', 'view'],
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    public $modelClass = 'app\models\Newsapi';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function actionPost() //create
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $location = new Newsapi();
        $location->scenario = Newsapi::SCENARIO_CREATE;
        $location->attributes = \yii::$app->request->post();


        // $url = 'https://www.cwiekmutnb.com/storage'.$location->n_img;
  
        // $dir = $_SERVER["DOCUMENT_ROOT"].'/upload/news/thumb/'.'freedom.jpg';

        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_URL, $url);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);
        // curl_setopt($curl, CURLOPT_HEADER, false);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // // curl_setopt($curl, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US)")
        // $raw_data = curl_exec($curl);
        // curl_close($curl);

        // $img=file_get_contents($raw_data);
        // file_put_contents($dir,$raw_data);

        // $raw_data->saveAs('../upload/news/thumb/freedom5.jpeg');

        // $fp = fopen($dir, 'x');
        // fwrite($fp, $raw_data);
        // fclose($fp)
       
        // $location->n_img = 'freedom';

    //     // Initialize a file URL to the variable
    //     $url = 'https://cwiekmutnb.com/storage'.$location->n_img;

    //     $file_name = basename($url);

    //     $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n")); 
    // //     //Basically adding headers to the request
    //     // $context = stream_context_create($opts);
    //     // $html = file_get_contents($url,false,$context);
    //     // $html = htmlspecialchars($html);

    //     $ch = curl_init($url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    //     $data = curl_exec($ch);
        // $data;

        // $json = json_decode(file_get_contents($data));

        // $url = 'https://...';
        // $json = json_decode($data);

        // $data->saveAs('../upload/news/thumb/freedom90.jpeg');

        // $extension = explode('/', mime_content_type($location->n_img))[1];
        $fileName = 'pt'.rand(1,10000).'.png';

        if (file_put_contents($_SERVER["DOCUMENT_ROOT"].'/upload/news/thumb/'.$fileName,  base64_decode($location->n_img)))
        {
            $location->n_img = $fileName;
        }else{
            $location->n_img = null;
        }

       

        if ($location->validate()) {
            $location->save();
            return array('status' => true, 'data' => 'Record is successfully updated');
        } else {
            return array('status' => false, 'data' => $location->getErrors());
        }
        
    }

    // public function actionGet()
    // {
    //     \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
    //     $new = Newsapi::find()->all();
    //     if (count($new) > 0) {
    //         return array('status' => true, 'data' => $new);
    //     } else {
    //         return array('status' => false, 'data' => 'No News Found');
    //     }
    // }

    // public function actionPut()
    // {
    //     \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
    //     $attributes = \yii::$app->request->post();
    //     $location = Newsapi::find()->where(['ID' => $attributes['id']])->one();
    //     if (count($location) > 0) {
    //         $location->attributes = \yii::$app->request->post();
    //         $location->save();
    //         return array('status' => true, 'data' => 'Location record is updated successfully');
    //     } else {
    //         return array('status' => false, 'data' => 'No Location Found');
    //     }
    // }
    public function actionDeleteRoll()
    {
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $attributes = \yii::$app->request->post();
        $location = Newsapi::find()->where(['ID' => $attributes['id']])->one();
        if (count($location) > 0) {
            $location->delete();
            return array('status' => true, 'data' => 'Location record is successfully deleted');
        } else {
            return array('status' => false, 'data' => 'No Location Found');
        }
    }


}