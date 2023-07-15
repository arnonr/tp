<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\EdType;
use yii\helpers\ArrayHelper;

    
$ed_type = EdType::find()->where(['active' => 1])->all();
$ed_type = ArrayHelper::map($ed_type,'ed_type_id','ed_type_name');
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
    <?= $form->field($model, 'ed_cat_name')->textInput() ?>

    <?= $form->field($model, 'ed_type_id')->dropDownList($ed_type,['prompt' => '-- เลือกประเภท --']) ?>

    <div class="form-group">
        <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-warning','onclick' => "return search()"]) ?>
    </div>
    
<?php ActiveForm::end(); ?>
    

    