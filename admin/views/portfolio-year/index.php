<?php
use yii\helpers\Html;

$this->title = 'ปีโครงการ';
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
$this->registerCssFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.css');
$this->registerJsFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.js');
?>

<div class="portfolio-year-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'portfolio-year',
        'text_add' => 'เพิ่ม'
    ]) ?>

    <?php
        $showData = [
            ['attribute' => 'port_year_name'],
        ];
    ?>

    <?= $this->render('../_gridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'portfolio-year',
        'showData' => $showData,
        'id' => 'port_year_id',
        'prefix' => 'port_year',
    ]) ?>
</div>