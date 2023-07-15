<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'หัวข้อหลัก';
$this->params['breadcrumbs'][] = ['label' => 'ประเภท', 'url' => ['ed-type/index']];
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
$this->registerCssFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.css');
$this->registerJsFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.js');
?>

<div class="ed-category-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'ed-category',
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
            ['attribute' => 'ed_cat_name'],
            [
                'attribute' => 'ed_type_id',
                'value' => function($data){
                    return $data->edType->ed_type_name;
                }
            ],
            [
                'label' => 'จัดการหัวข้อย่อย',
                'format' => 'raw',
                'value' => function($data){
                    return '<a data-pjax="0" class="btn btn-outline-primary" href="'.url::to(['ed-sub-category/index','EdSubCategorySearch[ed_cat_id]'=>$data->ed_cat_id]).'">จัดการ</a>';
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
                        'data-id' => $data->ed_cat_id,
                    ]);
                }
            ]
        ];
    ?>

    <?= $this->render('../_sortablegridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'ed-category',
        'showData' => $showData,
        'id' => 'ed_cat_id',
        'prefix' => 'ed_cat',
    ]) ?>
</div>