<?php
use yii\helpers\Html;

$this->title = 'ผลงาน';
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
$this->registerCssFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.css');
$this->registerJsFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.js');
?>

<div class="tgde-portfolio-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'tgde-portfolio',
        'text_add' => 'เพิ่ม'
    ]) ?>

    <?php
        $showData = [
            ['attribute' => 'tp_title'],
            [
                'attribute' => 'tp_year_id',
                'value' => function($data){
                    return $data->tgdePortfolioYear->tp_year_name;
                }
            ],
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
                        'data-id' => $data->tp_id,
                    ]);
                }
            ]
        ];
    ?>

    <?= $this->render('../_gridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'tgde-portfolio',
        'showData' => $showData,
        'id' => 'tp_id',
        'prefix' => 'tp',
    ]) ?>
</div>