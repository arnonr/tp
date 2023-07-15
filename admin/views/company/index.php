<?php
use yii\helpers\Html;

$this->title = 'สถานประกอบการ';
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
$this->registerCssFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.css');
$this->registerJsFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.js');
?>

<div class="company-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'company',
        'text_add' => 'เพิ่ม'
    ]) ?>

    <?php
        $showData = [
            ['attribute' => 'com_name'],
            [
                'attribute' => 'publish',
                'format' => 'raw',
                'headerOptions' => [
                    'class' => 'text-center'
                ],
                'contentOptions' => [
                    'class' => 'text-center'
                ],
                'value' => function($data){
                    return Html::checkBox('publish',$data->publish,[
                        'data-color' => '#009efb',
                        'class' => 'js-switch chk-publish',
                        'data-size' => 'small',
                        'data-id' => $data->com_id,
                    ]);
                }
            ]
        ];
    ?>

    <?= $this->render('../_gridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'company',
        'showData' => $showData,
        'id' => 'com_id',
        'prefix' => 'com',
    ]) ?>
</div>