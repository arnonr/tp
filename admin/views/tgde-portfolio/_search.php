<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TgdePortfolioYear;
use yii\helpers\ArrayHelper;

    $tp_year = TgdePortfolioYear::find()->where(['active' => 1])->all();
    $tp_year = ArrayHelper::map($tp_year,'tp_year_id','tp_year_name');
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
    <?= $form->field($model, 'tp_year_id')->dropDownList($tp_year,['prompt' => '-- Choose Year --']) ?>

    <?= $form->field($model, 'tp_title')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-warning','onclick' => "return search()"]) ?>
    </div>
    
<?php ActiveForm::end(); ?>
    

    