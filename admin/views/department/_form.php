<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<div class="department-form m-t-20">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'dep_name')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('บันทึก', ['class' => 'btn waves-effect waves-light btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>