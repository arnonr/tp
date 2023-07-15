<?php
use yii\helpers\Html;

$this->title = 'หัวข้อย่อย';
$this->params['breadcrumbs'][] = ['label' => 'ประเภท', 'url' => ['ed-type/index']];
$this->params['breadcrumbs'][] = ['label' => 'หัวข้อหลัก', 'url' => ['ed-category/index','ed_type_id' => $init['ed_type_id']]];
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
$this->registerCssFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.css');
$this->registerJsFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.js');
?>

<div class="ed-sub-category-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'ed-sub-category',
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
            ['attribute' => 'ed_sub_cat_name'],
            [
                'attribute' => 'ed_cat_id',
                'value' => function($data){
                    return $data->edCategory->ed_cat_name;
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
                        'data-id' => $data->ed_sub_cat_id,
                    ]);
                }
            ]
        ];
    ?>

    <?= $this->render('../_sortablegridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'ed-sub-category',
        'showData' => $showData,
        'id' => 'ed_sub_cat_id',
        'prefix' => 'ed_sub_cat',
    ]) ?>
</div>