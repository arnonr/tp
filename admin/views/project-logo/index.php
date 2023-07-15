<?php
use yii\helpers\Html;

$this->title = 'โครงการของเรา';
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
$this->registerCssFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.css');
$this->registerJsFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.js');
?>

<div class="project-logo-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'project-logo',
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
                'format' => 'raw',
                'attribute' => 'pro_logo_img',
                'value' => function($data){
                    return '<img src="'.Yii::$app->request->baseUrl.'/../upload/project-logo/'.$data->pro_logo_img.'" style="width:200px">';
                }
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
                        'data-id' => $data->pro_logo_id,
                    ]);
                }
            ]
        ];
    ?>

    <?= $this->render('../_sortablegridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'project-logo',
        'showData' => $showData,
        'id' => 'pro_logo_id',
        'prefix' => 'pro_logo',
    ]) ?>
</div>