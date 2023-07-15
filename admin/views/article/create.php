<?php
use yii\helpers\Html;

$this->title = 'เพิ่ม';
$this->params['breadcrumbs'][] = ['label' => 'หัวข้อหลัก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="ed-category-create">
	<div class="card border-info">
        <div class="card-body">
        	<h4 class="card-title"><?=$this->title; ?></h4>
        	 <hr>  
            <?= $this->render('_form', [
		        'model' => $model,
            	'art_type' => $art_type,
		    ]) ?>
        </div>
    </div>
</div>
