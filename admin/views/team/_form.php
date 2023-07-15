<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

echo $this->render('../edit_bug_kartik');
?>

<div class="team-form m-t-20">
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ],
    ]); ?>

        <?= $form->field($model, 'dep_id')->dropDownList($dep,['prompt' => '-- Choose Department --']) ?>
        
        <div class="row">
            <div class="col-md-2">
                <?= $form->field($model, 't_prefix')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-5">
                 <?= $form->field($model, 't_fname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-5">
                 <?= $form->field($model, 't_lname')->textInput(['maxlength' => true]) ?>
            </div> 
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 't_position')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 't_level')->textInput(['maxlength' => true]) ?>
            </div> 
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 't_phone')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 't_mail')->textInput(['maxlength' => true]) ?>
            </div> 
        </div>
        
        <div class="form-group field-team-t_img required">
            <label class="control-label" for="team-t_img">รูปภาพ</label>
            <?= Yii::$app->mpic->picform($model,'t_img','team','Team'); ?>
        </div>
        
        <div class="form-group">
            <?= Html::submitButton('SUBMIT', ['class' => 'btn waves-effect waves-light btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>