<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

echo $this->render('../edit_bug_kartik');

$items = [
    '_blank' => '_blank',
    '_self' => '_self'
]
?>

<div class="slide-form">
    <?php $form = ActiveForm::begin([
    	'options' => [
        	'enctype' => 'multipart/form-data'
    	],
	]); ?>
    
    <div class="form-group field-slide-slide_url required">
        <label class="control-label" for="slide-slide_url">รูปแบนเนอร์</label>
        <?= Yii::$app->mpic->picform($model,'slide_url','slide','Slide'); ?>
    </div>

    <?= $form->field($model, 'slide_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slide_target_link')->dropDownList($items,['-- Choose Targat Link --']) ?>
    
    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn waves-effect waves-light btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>