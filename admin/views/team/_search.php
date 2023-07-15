<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Department;
use yii\helpers\ArrayHelper;

    $department = Department::find()->where(['active' => 1])->all();
    $department = ArrayHelper::map($department,'dep_id','dep_name');
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
    <?= $form->field($model, 'dep_id')->dropDownList($department,['prompt' => '-- Choose Department --']) ?>

    <?= $form->field($model, 't_fname')->textInput() ?>
    <?= $form->field($model, 't_lname')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-warning','onclick' => "return search()"]) ?>
    </div>
    
<?php ActiveForm::end(); ?>
    

    