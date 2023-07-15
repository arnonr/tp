<?php
use yii\helpers\Html;

$this->title = 'ข่าว';
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
$this->registerCssFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.css');
$this->registerJsFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.js');
?>

<div class="news-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'news',
        'text_add' => 'เพิ่ม'
    ]) ?>

    <?php
        $showData = [
            ['attribute' => 'n_title'],
            [
                'attribute' => 'n_type_id',
                'value' => function($data){
                    return $data->newsType->n_type_name;
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
                        'data-id' => $data->n_id,
                    ]);
                }
            ]
        ];
    ?>

    <?= $this->render('../_gridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'news',
        'showData' => $showData,
        'id' => 'n_id',
        'prefix' => 'n',
    ]) ?>
</div>