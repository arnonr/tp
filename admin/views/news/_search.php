<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\NewsType;
use yii\helpers\ArrayHelper;

    $news_type = NewsType::find()->where(['active' => 1])->all();
    $news_type = ArrayHelper::map($news_type,'n_type_id','n_type_name');
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
    <?= $form->field($model, 'n_type_id')->dropDownList($news_type,['prompt' => '-- Choose News Type --']) ?>

    <?= $form->field($model, 'n_title')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-warning','onclick' => "return search()"]) ?>
    </div>
    
<?php ActiveForm::end(); ?>
    

    