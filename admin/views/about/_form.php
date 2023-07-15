<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');

$this->registerJsFile('https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js');
$this->registerCssFile($directoryAsset.'/assets/node_modules/froala_editor/css/third_party/font_awesome.min.css');
$this->registerCssFile($directoryAsset.'/assets/node_modules/froala_editor/css/froala_editor.pkgd.min.css');
$this->registerCssFile($directoryAsset.'/assets/node_modules/froala_editor/css/froala_style.min.css');

$this->registerJsFile($directoryAsset.'/assets/node_modules/froala_editor/js/froala_editor.pkgd.min.js');
$this->registerJsFile($directoryAsset.'/assets/node_modules/froala_editor/js/third_party/font_awesome.min.js');

echo $this->render('../edit_bug_kartik');
?>

<div class="about-form m-t-20">
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ],
    ]); ?>

        <?= $form->field($model, 'ab_title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ab_detail')->textArea(['maxlength' => true]) ?>
        
        <div class="form-group">
            <?= Html::submitButton('บันทึก', ['class' => 'btn waves-effect waves-light btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>

<script>
    $(document).ready(function() {
       $('#about-ab_detail').froalaEditor({
            height: 500,
            toolbarButtons: ['undo', 'redo', 'fullscreen', '|', 'fontSize', 'color', 'bold', 'italic', 'underline', 'inlineClass', '|', 'paragraphFormat', 'align', 'outdent', 'indent', '|','formatOL', 'formatUL',  'quote', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '|', 'fontAwesome', 'insertHR', 'selectAll', 'clearFormatting', '|', 'print', 'getPDF', 'html'],
            imageUploadURL: '<?=url::to(['uploadfroala/uploadimage']) ?>',
            fileUploadURL: '<?=url::to(['uploadfroala/uploadfile']) ?>',
            videoUploadURL: '<?=url::to(['uploadfroala/uploadvideo']) ?>',
       });
    });
</script>