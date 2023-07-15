<?php
use yii\helpers\Html;

$this->title = 'เพิ่ม';
$this->params['breadcrumbs'][] = ['label' => 'ข่าว', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="news-create">
	<div class="card border-info">
        <div class="card-body">
        	<h4 class="card-title"><?=$this->title; ?></h4>
        	 <hr>  
            <?= $this->render('_form', [
		        'model' => $model,
            	'news_type' => $news_type,
                'picture' => $picture
		    ]) ?>
        </div>
    </div>
</div>
