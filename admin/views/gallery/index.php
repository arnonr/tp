<?php
use yii\helpers\Html;

$this->title = 'คลังภาพ';
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
$this->registerCssFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.css');
$this->registerJsFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.js');
?>

<div class="gallery-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'gallery',
        'text_add' => 'เพิ่ม'
    ]) ?>

    <?php
        $showData = [
            ['attribute' => 'gall_title'],
            [
                'attribute' => 'views',
                'headerOptions' => [
                    'class' => 'text-center'
                ],
                'contentOptions' => [
                    'class' => 'text-center'
                ],
            ],
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
                        'data-id' => $data->gall_id,
                    ]);
                }
            ]
        ];
    ?>

    <?= $this->render('../_gridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'gallery',
        'showData' => $showData,
        'id' => 'gall_id',
        'prefix' => 'gall',
    ]) ?>
</div>