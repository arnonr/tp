<?php
use yii\helpers\Html;

$this->title = 'ประเภทข่าว';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="news-type-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'news-type',
        'text_add' => 'เพิ่ม'
    ]) ?>

    <?php
        $showData = [
            ['attribute' => 'n_type_name'],
            [
                'attribute' => 'create',
                'headerOptions' => ['data-hide' => 'phone, tablet'],
                'value' => function($data){
                    return Yii::$app->Formatter->asDate($data->create,'php:d/m/Y');
                }
            ],
        ];
    ?>

    <?= $this->render('../_gridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'news-type',
        'showData' => $showData,
        'id' => 'n_type_id',
        'prefix' => 'n_type',
    ]) ?>
</div>
