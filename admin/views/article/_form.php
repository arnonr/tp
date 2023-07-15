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

$art_sub = [1 => 'บริการภายในมหาวิทยาลัย',2 => 'บริการภายนอก'];
?>

<div class="article-form m-t-20">
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ],
    ]); ?>

    	<?= $form->field($model, 'a_type_id')->dropDownList($art_type) ?>

        <?php 
            if($model->a_type_id == 3){
                echo $form->field($model, 'a_type_sub_id')->dropDownList($art_sub,['prompt' => '-- Choose Article Sub --']);
            }
        ?>

    	<div class="form-group field-article-n_img required">
            <label class="control-label" for="article-a_img">รูปภาพปก</label>
            <?= Yii::$app->mpic->picform($model,'a_img','article','Article'); ?>
        </div>

        <?= $form->field($model, 'a_title')->textInput() ?>
        <?= $form->field($model, 'a_detail')->textArea(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('บันทึก', ['class' => 'btn waves-effect waves-light btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>


<script>
    $(document).ready(function() {
       $('#article-a_detail').froalaEditor({
            height: 500,
            toolbarButtons: ['undo', 'redo', 'fullscreen', '|', 'fontSize', 'color', 'bold', 'italic', 'underline', 'inlineClass', '|', 'paragraphFormat', 'align', 'outdent', 'indent', '|','formatOL', 'formatUL',  'quote', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '|', 'fontAwesome', 'insertHR', 'selectAll', 'clearFormatting', '|', 'print', 'getPDF', 'html'],
            imageUploadURL: '<?=url::to(['uploadfroala/uploadimage']) ?>',
            fileUploadURL: '<?=url::to(['uploadfroala/uploadfile']) ?>',
            videoUploadURL: '<?=url::to(['uploadfroala/uploadvideo']) ?>',
       });

       var a_type_id = $("#article-a_type_id").val();
       $(".field-article-art_type_sub_id").hide();
       
       if(a_type_id == 2){
            $(".field-article-art_type_sub_id").show();
       }

       $("#article-a_type_id").change(function(){
            if($(this).val() == 2){
                $(".field-article-art_type_sub_id").show();
            }else{
                 $(".field-article-art_type_sub_id").hide();
            }
       })
    });
</script>