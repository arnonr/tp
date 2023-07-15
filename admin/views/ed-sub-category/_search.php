<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\EdType;
use app\models\EdCategory;
use yii\helpers\ArrayHelper;

    
$ed_type = EdType::find()->where(['active' => 1])->all();
$ed_type = ArrayHelper::map($ed_type,'ed_type_id','ed_type_name');

$ed_category = EdCategory::find()->where(['active' => 1])->all();
$ed_category = ArrayHelper::map($ed_category,'ed_cat_id','ed_cat_name');
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
    <?= $form->field($model, 'ed_sub_cat_name')->textInput() ?>

    <?= $form->field($model, 'ed_cat_id')->dropDownList($ed_category,['prompt' => '-- Choose Main Subject --']) ?>

    <div class="form-group">
        <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-warning','onclick' => "return search()"]) ?>
    </div>
    
<?php ActiveForm::end(); ?>
    

    