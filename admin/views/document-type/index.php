<?php
use yii\helpers\Html;
use app\models\DocumentType;

$this->title = 'ประเภทเอกสาร';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="document-type-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'document-type',
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
            [
                'header' => 'ประเภทเอกสาร',
                'attribute' => 'doc_type_name',
                'headerOptions' => [
                    'data-sort-ignore' => 'true',
                ],
            ],
            [
                'header' => 'หน่วยงาน',
                'attribute' => 'doc_type_main_id',
                'headerOptions' => [
                    'data-sort-ignore' => 'true',
                ],
                'value' => function($data){
                    $dep = [1 => 'สำนักงาน',2 => 'สหกิจศึกษา',3 => 'พัฒนาสื่อ'];
                    return $dep[$data->doc_type_main_id];
                }
            ],
        ];
    ?>

    <?= $this->render('../_sortablegridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'document-type',
        'showData' => $showData,
        'id' => 'doc_type_id',
        'prefix' => 'doc_type',
    ]) ?>
</div>
