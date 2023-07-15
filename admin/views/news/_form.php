<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use app\models\Picture;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');

$this->registerJsFile('https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js');
$this->registerCssFile($directoryAsset.'/assets/node_modules/froala_editor/css/third_party/font_awesome.min.css');
$this->registerCssFile($directoryAsset.'/assets/node_modules/froala_editor/css/froala_editor.pkgd.min.css');
$this->registerCssFile($directoryAsset.'/assets/node_modules/froala_editor/css/froala_style.min.css');

$this->registerJsFile($directoryAsset.'/assets/node_modules/froala_editor/js/froala_editor.pkgd.min.js');
$this->registerJsFile($directoryAsset.'/assets/node_modules/froala_editor/js/third_party/font_awesome.min.js');

echo $this->render('../edit_bug_kartik');
?>

<div class="news-form m-t-20">
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ],
    ]); ?>

        <?= $form->field($model, 'n_type_id')->dropDownList($news_type,['prompt' => '-- Choose News Type --']) ?>

        <?= $form->field($model, 'n_title')->textInput(['maxlength' => true]) ?>

        <div class="form-group field-news-n_img required">
            <label class="control-label" for="news-n_img">รูปภาพปก</label>
            <?= Yii::$app->mpic->picform($model,'n_img','news','News'); ?>
        </div>

         <?= $form->field($model, 'n_detail')->textArea(['maxlength' => true]) ?>

        <div class="form-group field-picture-news_gall_file required">
            <label class="control-label" for="news-gallery-gall_img">รูปภาพ</label>
            <?php
                $gallTime = time();
                echo Html::hiddenInput('gallTime',$gallTime);

                $optionGall['uploadUrl'] = Url::to(['news/upload']);
                $optionGall['uploadExtraData'] = ['gallTime' => $gallTime];
                // If update is show image
                if($model->n_id != NULL){
                    $gallShow = Picture::findAll(['news_id' => $model->n_id,'active' => 1]);
                    if($gallShow != NULL){
                        $preview = [];
                        $previewConfig = [];
                        foreach ($gallShow as $gallShowItems) {
                            array_push($preview, Yii::$app->request->baseurl."/../upload/gallery/".$gallShowItems->pic_img);
                            array_push($previewConfig,['url' => url::to(['/news/deletegall','id' => $gallShowItems->pic_id])]);

                        }
                        $optionGall['initialPreview'] = $preview;
                        $optionGall['initialPreviewConfig'] = $previewConfig;
                        $optionGall['initialPreviewAsData'] = true;
                        $optionGall['overwriteInitial'] = false;

                    }
                }
                $optionGall['deleteUrl'] = Url::to(['news/deletegall']);
                echo FileInput::widget([
                    'model' => $picture,
                    'attribute' => 'gall_file',
                    'options'=>['multiple'=>true],
                    'pluginOptions' => $optionGall,
                    'pluginLoading' => true,
                ]);
            ?>
        </div>
        

        <div class="form-group">
            <?= Html::submitButton('บันทึก', ['class' => 'btn waves-effect waves-light btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>

<script>
    $(document).ready(function() {
       $('#news-n_detail').froalaEditor({
            height: 500,
            toolbarButtons: ['undo', 'redo', 'fullscreen', '|', 'fontSize', 'color', 'bold', 'italic', 'underline', 'inlineClass', '|', 'paragraphFormat', 'align', 'outdent', 'indent', '|','formatOL', 'formatUL',  'quote', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '|', 'fontAwesome', 'insertHR', 'selectAll', 'clearFormatting', '|', 'print', 'getPDF', 'html'],
            imageUploadURL: '<?=url::to(['uploadfroala/uploadimage']) ?>',
            fileUploadURL: '<?=url::to(['uploadfroala/uploadfile']) ?>',
            videoUploadURL: '<?=url::to(['uploadfroala/uploadvideo']) ?>',
       });
    });
</script>