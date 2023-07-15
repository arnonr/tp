<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');


echo $this->render('../edit_bug_kartik');
?>

<div class="portfolio-sub-project-form m-t-20">
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ],
    ]); ?>
        <?= $form->field($model, 'port_pro_id')->dropDownList($init['port_pro'],['readonly' => true]) ?>
        <?= $form->field($model, 'port_sub_pro_name')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('บันทึก', ['class' => 'btn waves-effect waves-light btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>

