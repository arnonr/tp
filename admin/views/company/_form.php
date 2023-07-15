<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

echo $this->render('../edit_bug_kartik');
?>

<div class="company-form m-t-20">
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ],
    ]); ?>

        <?= $form->field($model, 'com_name')->textInput(['maxlength' => true]) ?>

        <div class="form-group field-company-com_img required">
            <label class="control-label" for="company-com_img">โลโก้</label>
            <?= Yii::$app->mpic->picform($model,'com_img','company','Company'); ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('บันทึก', ['class' => 'btn waves-effect waves-light btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>