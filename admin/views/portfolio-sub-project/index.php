<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'โครงการบูรณาการเขต EEC (โครงการย่อย)';
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
$this->registerCssFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.css');
$this->registerJsFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.js');
?>

<div class="portfolio-sub-project-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'portfolio-sub-project',
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
            ['attribute' => 'port_sub_pro_name'],
            [
                'attribute' => 'port_pro_id',
                'value' => function($data){
                    return $data->portfolioProject->port_pro_name;
                }
            ],
            [
                'label' => 'จัดการหัวข้อ',
                'format' => 'raw',
                'value' => function($data){
                    return "<a href='".url::to(['portfolio/index','PortfolioSearch[port_sub_pro_id]' => $data->port_sub_pro_id])."' class='btn btn-primary' data-pjax='0'>จัดการ</a>";
                }
            ],
        ];
    ?>

    <?= $this->render('../_sortablegridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'portfolio-sub-project',
        'showData' => $showData,
        'id' => 'port_sub_pro_id',
        'prefix' => 'port_sub_pro',
    ]) ?>
</div>