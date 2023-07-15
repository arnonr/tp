<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;

$dep = [1 => 'สำนักงาน',2 => 'สหกิจศึกษา',3 => 'พัฒนาสื่อ'];
echo $this->render('../edit_bug_kartik');
?>

<div class="document-form">
    <?php $form = ActiveForm::begin([
    	'options' => [
        	'enctype' => 'multipart/form-data'
    	],
	]); ?>
    
    <?= $form->field($model, 'doc_type_main_id')->hiddenInput()->label(false); ?>
        
    <?=$form->field($model, 'doc_type_id')->widget(DepDrop::classname(), [
            'options'=>['id'=>'document-doc_type_id'],
            'data'=> $doc_type,
            'pluginOptions'=>[
                'depends'=>['document-doc_type_main_id'],
                'placeholder'=>'-- Choose Document Type --',
                'url'=>Url::to(['/document-type/get-document-type'])
            ],
            'pluginEvents' => [
                "depdrop.afterChange"=>"function(event, id, value) { $('#document-doc_type_id').selectpicker('refresh'); }",
            ],
        ])->label('ประเภทเอกสารหลัก');
    ?>
	
    <?= $form->field($model, 'doc_title')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group field-document-doc_url required">
        <label class="control-label" for="document-doc_url">ไฟล์</label>
        <?= Yii::$app->mdoc->docform($model,'doc_url','document','Document'); ?>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn waves-effect waves-light btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>