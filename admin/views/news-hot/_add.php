<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

echo $this->render('../edit_bug_kartik');
?>

<?php $form = ActiveForm::begin(); ?>
    <?php  
        echo $form->field($model, 'n_id')->widget(Select2::classname(), [
            'data' => $news,
            'language' => 'en',
            'options' => ['placeholder' => '-- Choose News --'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn waves-effect waves-light btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>
    

