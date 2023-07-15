<?php
use yii\helpers\Html;

$this->title = 'ข่าวเด่น';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="news-hot-index">
    <?= $this->render('../_header_nh_index',[
        'model' => $model,
        'controller' => 'news-hot',
        'news' => $news,
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
                'header' => 'ข่าว',
                'attribute' => 'n_id',
                'headerOptions' => [
                    'data-sort-ignore' => 'true',
                ],
                'value' => function($data){
                    return $data->news->n_title;
                }
            ],
            [
                'header' => 'ประเภทข่าว',
                'attribute' => 'n_id',
                'headerOptions' => [
                    'data-sort-ignore' => 'true',
                ],
                'value' => function($data){
                    return $data->news->newsType->n_type_name;
                }
            ],
        ];
    ?>

    <?= $this->render('../_sortablegridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'news-hot',
        'showData' => $showData,
        'id' => 'nh_id',
        'prefix' => 'nh',
    ]) ?>
</div>
