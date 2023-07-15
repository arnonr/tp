<?php
use yii\helpers\Html;

$this->title = 'ปีผลงาน';
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
$this->registerCssFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.css');
$this->registerJsFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.js');
?>

<div class="tgde-portfolio-year-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'tgde-portfolio-year',
        'text_add' => 'เพิ่ม'
    ]) ?>

    <?php
        $showData = [
            ['attribute' => 'tp_year_name'],
        ];
    ?>

    <?= $this->render('../_gridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'tgde-portfolio-year',
        'showData' => $showData,
        'id' => 'tp_year_id',
        'prefix' => 'tp_year',
    ]) ?>
</div>