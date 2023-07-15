<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Km */

$this->title = 'Update Km: ' . $model->km_id;
$this->params['breadcrumbs'][] = ['label' => 'Kms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->km_id, 'url' => ['view', 'id' => $model->km_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="km-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
