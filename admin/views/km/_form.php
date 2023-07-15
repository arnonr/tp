<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
    echo $this->render('../edit_bug_kartik');
?>

<div class="km-form m-t-20">
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ],
    ]); ?>

        <?= $form->field($model, 'km_title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'km_writer')->textInput(['maxlength' => true]) ?>

        <div class="form-group field-km-km_url required">
            <label class="control-label" for="km-km_url">ไฟล์</label>
            <?= Yii::$app->mdoc->docform($model,'km_url','km','Km'); ?>
        </div>

        <?= $form->field($model, 'km_link')->textInput(['maxlength' => true])->label('ลิ้งค์ภายนอก (ในกรณีเป็นวิดีโอ)') ?>
        

        <div class="form-group">
            <?= Html::submitButton('บันทึก', ['class' => 'btn waves-effect waves-light btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>