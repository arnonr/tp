<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'เอกสารดาวน์โหลด';
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
$this->registerCssFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.css');
$this->registerJsFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.js');
?>
<div class="document-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'document',
        'text_add' => 'เพิ่ม'
    ]) ?>
    <a href="<?=url::to(['document-type/index','DocumentTypeSearch[doc_type_main_id]' => $searchModel->doc_type_main_id])?>" class="btn btn-primary" style="margin:1em;" target="_blank">จัดการประเภทเอกสาร</a>

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
            ['attribute' => 'doc_title'],
            [
                'attribute' => 'doc_type_id',
                'value' => function($data){
                    return $data->documentType->doc_type_name;
                }
            ],
            // [
            //     'attribute' => 'doc_type_main_id',
            //     'value' => function($data){
            //         $dep = [1 => 'สำนักงาน',2 => 'สหกิจศึกษา',3 => 'พัฒนาสื่อ'];
            //         return $dep[$data->documentType->doc_type_main_id];
            //     }
            // ],
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
                        'data-id' => $data->doc_id,
                    ]);
                }
            ]
        ];
    ?>

    <?= $this->render('../_sortablegridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'document',
        'showData' => $showData,
        'id' => 'doc_id',
        'prefix' => 'doc',
    ]) ?>
</div>