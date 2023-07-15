<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;


$dep = [1 => 'สำนักงาน',2 => 'สหกิจศึกษา',3 => 'พัฒนาสื่อ'];
echo $this->render('../edit_bug_kartik');
?>

<div class="document-type-form">
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'doc_type_main_id')->dropDownList($dep,['prompt' => '-- Choose Department --']) ?>

    <?= $form->field($model, 'doc_type_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn waves-effect waves-light btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>