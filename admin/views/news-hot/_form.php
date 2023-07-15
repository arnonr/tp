<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NewsHot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-hot-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'n_id')->textInput() ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'create')->textInput() ?>

    <?= $form->field($model, 'update')->textInput() ?>

    <?= $form->field($model, 'createby')->textInput() ?>

    <?= $form->field($model, 'updateby')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
