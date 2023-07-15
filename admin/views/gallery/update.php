<?php
use yii\helpers\Html;

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'คลังภาพ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="gallery-update">
	<div class="card border-info">
        <div class="card-body">
        	<h4 class="card-title"><?=$this->title; ?></h4>
        	 <hr>  
            <?= $this->render('_form', [
		        'model' => $model,
			    'picture' => $picture,
		    ]) ?>
        </div>
    </div>
</div>
