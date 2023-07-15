<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\DocumentType;
use yii\helpers\ArrayHelper;

    echo $this->render('../edit_bug_kartik');

    $documentType = DocumentType::find()->where([
        'active' => 1,
        'doc_type_main_id' => $_GET['DocumentSearch']['doc_type_main_id']
    ])->all();
    
    $documentType = ArrayHelper::map($documentType,'doc_type_id','doc_type_name');    
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
    
    <?= $form->field($model, 'doc_type_main_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'doc_type_id')->dropDownList($documentType ,['prompt' => '-- Choose Document Type --']) ?>

    <?= $form->field($model, 'doc_title')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-warning']) ?>
    </div>
    
<?php ActiveForm::end(); ?>
    

    