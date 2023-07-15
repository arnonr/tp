<?php
use yii\helpers\Html;

$this->title = 'หน่วยงาน';
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
$this->registerCssFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.css');
$this->registerJsFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.js');
?>

<div class="document-type-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'department',
        'text_add' => 'ADD'
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
            [
                'header' => 'หน่วยงาน',
                'attribute' => 'dep_name',
                'headerOptions' => [
                    'data-sort-ignore' => 'true',
                ],
            ],
            [
                'header' => 'เผยแพร่',
                'attribute' => 'publish',
                'format' => 'raw',
                'headerOptions' => [
                    'class' => 'text-center',
                    'data-sort-ignore' => 'true',
                ],
                'contentOptions' => [
                    'class' => 'text-center'
                ],
                'value' => function($data){
                    return Html::checkBox('publish',$data->publish,[
                        'data-color' => '#009efb',
                        'class' => 'js-switch chk-publish',
                        'data-size' => 'small',
                        'data-id' => $data->dep_id,
                    ]);
                }
            ]
        ];
    ?>

    <?= $this->render('../_sortablegridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'department',
        'showData' => $showData,
        'id' => 'dep_id',
        'prefix' => 'dep',
    ]) ?>
</div>
