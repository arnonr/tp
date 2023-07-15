<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="news-type-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'n_type_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn waves-effect waves-light btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>