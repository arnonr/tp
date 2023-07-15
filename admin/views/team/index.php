<?php
use yii\helpers\Html;

$this->title = 'บุคลากร';
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
$this->registerCssFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.css');
$this->registerJsFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.js');
?>

<div class="team-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'team',
        'text_add' => 'เพิ่ม'
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
                'header' => 'ชื่อ',
                'attribute' => 't_fname',
                'headerOptions' => [
                    'data-sort-ignore' => 'true',
                ],
            ],
            [
                'header' => 'นามสกุล',
                'attribute' => 't_lname',
                'headerOptions' => [
                    'data-sort-ignore' => 'true',
                ],
            ],
            [
                'header' => 'หน่วยงาน',
                'attribute' => 'dep_id',
                'headerOptions' => [
                    'data-sort-ignore' => 'true',
                ],
                'value' => function($data){
                    return $data->department->dep_name;
                }
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
                        'data-id' => $data->t_id,
                    ]);
                }
            ]
        ];
    ?>

    <?= $this->render('../_sortablegridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'team',
        'showData' => $showData,
        'id' => 't_id',
        'prefix' => 't',
    ]) ?>
</div>
