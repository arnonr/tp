<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use app\models\PortfolioPicture;


$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');

$this->registerJsFile('https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js');
$this->registerCssFile($directoryAsset.'/assets/node_modules/froala_editor/css/third_party/font_awesome.min.css');
$this->registerCssFile($directoryAsset.'/assets/node_modules/froala_editor/css/froala_editor.pkgd.min.css');
$this->registerCssFile($directoryAsset.'/assets/node_modules/froala_editor/css/froala_style.min.css');

$this->registerJsFile($directoryAsset.'/assets/node_modules/froala_editor/js/froala_editor.pkgd.min.js');
$this->registerJsFile($directoryAsset.'/assets/node_modules/froala_editor/js/third_party/font_awesome.min.js');

echo $this->render('../edit_bug_kartik');
?>

<div class="portfolio-form m-t-20">
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ],
    ]); ?>

        <?= $form->field($model, 'port_year_id_show')->dropDownList($init['year_arr'],['readonly' => true]) ?>

        <?= $form->field($model, 'port_pro_id_show')->dropDownList($init['port_pro_arr'],['readonly' => true]) ?>

        <?= $form->field($model, 'port_sub_pro_id')->dropDownList($init['port_sub_pro_arr'],['readonly' => true]) ?>


        <?= $form->field($model, 'p_title')->textInput(['maxlength' => true]) ?>

      
        <?= $form->field($model, 'p_detail')->textArea(['maxlength' => true]) ?>


         <div class="form-group field-picture-port_gall_file required">
            <label class="control-label" for="port-gallery-gall_img">รูปภาพ</label>
            <?php
                $gallTime = time();
                echo Html::hiddenInput('gallTime',$gallTime);

                $optionGall['uploadUrl'] = Url::to(['portfolio/upload']);
                $optionGall['uploadExtraData'] = ['gallTime' => $gallTime];
                // If update is show image
                if($model->p_id != NULL){
                    $gallShow = PortfolioPicture::findAll(['p_id' => $model->p_id,'active' => 1]);
                    if($gallShow != NULL){
                        $preview = [];
                        $previewConfig = [];
                        foreach ($gallShow as $gallShowItems) {
                            array_push($preview, Yii::$app->request->baseurl."/../upload/port-gallery/".$gallShowItems->port_pic_img);
                            array_push($previewConfig,['url' => url::to(['/portfolio/deletegall','id' => $gallShowItems->port_pic_id])]);

                        }
                        $optionGall['initialPreview'] = $preview;
                        $optionGall['initialPreviewConfig'] = $previewConfig;
                        $optionGall['initialPreviewAsData'] = true;
                        $optionGall['overwriteInitial'] = false;

                    }
                }
                $optionGall['deleteUrl'] = Url::to(['portfolio/deletegall']);
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
       $('#portfolio-p_detail').froalaEditor({
            height: 500,
            toolbarButtons: ['undo', 'redo', 'fullscreen', '|', 'fontSize', 'color', 'bold', 'italic', 'underline', 'inlineClass', '|', 'paragraphFormat', 'align', 'outdent', 'indent', '|','formatOL', 'formatUL',  'quote', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '|', 'fontAwesome', 'insertHR', 'selectAll', 'clearFormatting', '|', 'print', 'getPDF', 'html'],
            imageUploadURL: '<?=url::to(['uploadfroala/uploadimage']) ?>',
            fileUploadURL: '<?=url::to(['uploadfroala/uploadfile']) ?>',
            videoUploadURL: '<?=url::to(['uploadfroala/uploadvideo']) ?>',
       });
    });
</script>