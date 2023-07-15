<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'ประเภท';
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
$this->registerCssFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.css');
$this->registerJsFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.js');
?>

<div class="ed-type-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'ed-type',
        'text_add' => 'เพิ่ม'
    ]) ?>

    <?php
        $showData = [
            ['attribute' => 'ed_type_name'],
            [
                'label' => 'จัดการหัวข้อหลัก',
                'format' => 'raw',
                'value' => function($data){
                    return '<a data-pjax="0" class="btn btn-outline-primary" href="'.url::to(['ed-category/index','EdCategorySearch[ed_type_id]'=>$data->ed_type_id]).'">จัดการ</a>';
                }
            ],
        ];
    ?>

    <?= $this->render('../_gridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'ed-type',
        'showData' => $showData,
        'id' => 'ed_type_id',
        'prefix' => 'ed_type',
    ]) ?>
</div>