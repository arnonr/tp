<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

echo $this->render('../edit_bug_kartik');
?>

<div class="project-logo-form">
    <?php $form = ActiveForm::begin([
    	'options' => [
        	'enctype' => 'multipart/form-data'
    	],
	]); ?>
    
    <div class="form-group field-project-logo-pro_logo_img required">
        <label class="control-label" for="project-logo-pro_logo_img">รูปโลโก้</label>
        <?= Yii::$app->mpic->picform($model,'pro_logo_img','project-logo','ProjectLogo'); ?>
    </div>

    <?= $form->field($model, 'pro_logo_link')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn waves-effect waves-light btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>