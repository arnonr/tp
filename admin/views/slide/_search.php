<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SlideSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slide-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'slide_id') ?>

    <?= $form->field($model, 'slide_url') ?>

    <?= $form->field($model, 'create') ?>

    <?= $form->field($model, 'update') ?>

    <?= $form->field($model, 'createby') ?>

    <?php // echo $form->field($model, 'updateby') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'slide_link') ?>

    <?php // echo $form->field($model, 'publish') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
