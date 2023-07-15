<?php
use yii\helpers\Html;

$this->title = 'ประเภทบทความ';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="article-type-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'article-type',
        'text_add' => 'ADD'
    ]) ?>

    <?php
        $showData = [
            ['attribute' => 'a_type_name'],
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
        'controller' => 'article-type',
        'showData' => $showData,
        'id' => 'a_type_id',
        'prefix' => 'a_type',
    ]) ?>
</div>
