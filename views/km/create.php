<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Km */

$this->title = 'Create Km';
$this->params['breadcrumbs'][] = ['label' => 'Kms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="km-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
