<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$dep = [1 => 'สำนักงาน',2 => 'สหกิจศึกษา',3 => 'พัฒนาสื่อ'];
?>

<?php 
    $form = ActiveForm::begin([
        'id' => 'form-search',
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]);
?>
    <?= $form->field($model, 'doc_type_main_id')->dropDownList($dep,['prompt' => '-- Choose Department --']) ?>

    <?= $form->field($model, 'doc_type_name')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-warning','onclick' => "return search()"]) ?>
    </div>
    
<?php ActiveForm::end(); ?>
    

    