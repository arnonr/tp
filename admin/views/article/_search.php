<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ArticleType;
use yii\helpers\ArrayHelper;

    $art_type = ArticleType::find()->where(['active' => 1])->all();
    $art_type = ArrayHelper::map($art_type,'a_type_id','a_type_name');
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
    <?= $form->field($model, 'a_type_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'a_title')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-warning']) ?>
    </div>
    
<?php ActiveForm::end(); ?>
    

    