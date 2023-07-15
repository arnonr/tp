<?php
use yii\helpers\Html;

$this->title = 'เพิ่ม';
$this->params['breadcrumbs'][] = ['label' => 'เอกสารดาวน์โหลด', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="document-create">
	<div class="card border-info">
        <div class="card-body">
        	<h4 class="card-title"><?=$this->title; ?></h4>
        	 <hr>  
            <?= $this->render('_form', [
		        'model' => $model,
		        'doc_type' => $doc_type,
                'doc_type_sub' => $doc_type_sub,
		    ]) ?>
        </div>
    </div>
</div>
