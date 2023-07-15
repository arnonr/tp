<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

    echo $this->render('../edit_bug_kartik');

    $dirAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');

    // Lightpick
    $this->registerCssFile($dirAsset.   '/../../node_modules/lightpick/css/lightpick.css');
    $this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js');
    $this->registerJsFile($dirAsset.'/../../node_modules/lightpick/lightpick.js');
?>

<div class="document-form">
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ],
    ]); ?>
    
    <?= $form->field($model, 'an_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'an_date')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group field-annouce-an_url required">
        <label class="control-label" for="annouce-an_url">ไฟล์</label>
        <?= Yii::$app->mdoc->docform($model,'an_url','annouce','Annouce'); ?>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn waves-effect waves-light btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<script>
    $(document).ready(function(){
        var picker = new Lightpick({
            field: document.getElementById('annouce-an_date'),
            singleDate: true,
            startDate: "<?=$init['init_an_date'] ?>",
            format: 'DD/MM/YYYY',
           
        });
    })
</script>