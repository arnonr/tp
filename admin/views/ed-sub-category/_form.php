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

<div class="ed-sub-category-form m-t-20">
    <?php $form = ActiveForm::begin([
        'id' => 'form-1',
        'options' => [
            'enctype' => 'multipart/form-data'
        ],
    ]); ?>

        <?= $form->field($model, 'ed_cat_id')->dropDownList($init['education_category_arr'],['prompt' => '-- เลือกประเภท --']) ?>

        <?= $form->field($model, 'ed_sub_cat_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ed_sub_cat_detail')->textArea(['maxlength' => true]) ?>

        
        <div class="form-group">
            <?= Html::submitButton('บันทึก', ['class' => 'btn waves-effect waves-light btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>

<script>
    $(document).ready(function() {
       $('#edsubcategory-ed_sub_cat_detail').froalaEditor({
            height: 500,
            toolbarButtons: ['undo', 'redo', 'fullscreen', '|', 'fontSize', 'color', 'bold', 'italic', 'underline', 'inlineClass', '|', 'paragraphFormat', 'align', 'outdent', 'indent', '|','formatOL', 'formatUL',  'quote', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '|', 'fontAwesome', 'insertHR', 'selectAll', 'clearFormatting', '|', 'print', 'getPDF', 'html','fullscreen'],
            imageUploadURL: '<?=url::to(['uploadfroala/uploadimage']) ?>',
            fileUploadURL: '<?=url::to(['uploadfroala/uploadfile']) ?>',
            videoUploadURL: '<?=url::to(['uploadfroala/uploadvideo']) ?>',
            fileMaxSize: 1024 * 1024 * 20
       });

       $('#form-1').submit(function() {
        var text = $('#edsubcategory-ed_sub_cat_detail').val()
        var res = text.replace('<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>', "");
        $('#edsubcategory-ed_sub_cat_detail').val(res);
        return true; // return false to cancel form action
        });
    });
</script>


