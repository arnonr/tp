<?php
use yii\helpers\Html;

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'ประเภท', 'url' => ['ed-type/index']];
$this->params['breadcrumbs'][] = ['label' => 'หัวข้อหลัก', 'url' => ['ed-category/index','ed_type_id' => $init['ed_type_id']]];
$this->params['breadcrumbs'][] = ['label' => 'หัวข้อย่อย', 'url' => ['ed-sub-category/index','ed_cat_id' => $init['ed_cat_id']]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="ed-subcategory-update">
    <div class="card border-info">
        <div class="card-body">
            <h4 class="card-title"><?=$this->title; ?></h4>
             <hr>  
            <?= $this->render('_form', [
                'model' => $model,
                'init' => $init
            ]) ?>
        </div>
    </div>
</div>
