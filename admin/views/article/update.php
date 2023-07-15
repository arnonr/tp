<?php
use yii\helpers\Html;

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'หัวข้อหลัก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-rounded">
        <?= Yii::$app->session->getFlash('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
<?php endif; ?>

<div class="ed-category-update">
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


