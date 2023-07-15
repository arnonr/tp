<?php
use yii\helpers\Html;

$this->title = 'หัวข้อ';
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
$this->registerCssFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.css');
$this->registerJsFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.js');
?>

<div class="portfolio-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'portfolio',
        'text_add' => 'เพิ่ม',
    ]) ?>

    <?php
        $showData = [
            [
                'attribute' => 'order',
                'header' => 'ลำดับ',
                'format' => 'raw',
                'filter' => false,
                'value' => function($data){
                    return '<span class="btn bg-success waves-effect"><i class="fa fa-arrows"></i></span>';
                },
                'contentOptions' => ['class' => 'text-center','style' => 'width:50px;'],
                'headerOptions' => ['class' => 'text-center']
            ],
            ['attribute' => 'p_title'],
            [
                'attribute' => 'port_sub_pro_id',
                'value' => function($data){
                    return $data->portfolioSubProject->port_sub_pro_name;
                }
            ],
            // [
            //     'attribute' => 'views',
            //     'headerOptions' => [
            //         'class' => 'text-center'
            //     ],
            //     'contentOptions' => [
            //         'class' => 'text-center'
            //     ],
            // ],
            // [
            //     'attribute' => 'publish',
            //     'format' => 'raw',
            //     'headerOptions' => [
            //         'class' => 'text-center'
            //     ],
            //     'contentOptions' => [
            //         'class' => 'text-center'
            //     ],
            //     'value' => function($data){
            //         return Html::checkBox('publish',$data->publish,[
            //             'data-color' => '#009efb',
            //             'class' => 'js-switch chk-publish',
            //             'data-size' => 'small',
            //             'data-id' => $data->p_id,
            //         ]);
            //     }
            // ]
        ];
    ?>

    <?= $this->render('../_sortablegridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'portfolio',
        'showData' => $showData,
        'id' => 'p_id',
        'prefix' => 'p',
    ]) ?>
</div>