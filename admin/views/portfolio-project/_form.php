<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');


echo $this->render('../edit_bug_kartik');
?>

<div class="portfolio-project-form m-t-20">
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ],
    ]); ?>
        <?= $form->field($model, 'port_year_id')->dropDownList($init['port_year'],['prompt' => '-- Choose Year --']) ?>
        <?= $form->field($model, 'port_pro_name')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('บันทึก', ['class' => 'btn waves-effect waves-light btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>

