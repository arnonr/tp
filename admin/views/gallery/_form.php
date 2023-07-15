<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use app\models\Picture;

echo $this->render('../edit_bug_kartik');
?>

<div class="gallery-form m-t-20">
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ],
    ]); ?>

        <?= $form->field($model, 'gall_title')->textInput(['maxlength' => true]) ?>

        <div class="form-group field-gallery-gall_img required">
            <label class="control-label" for="gallery-gall_img">รูปภาพปก</label>
            <?= Yii::$app->mpic->picform($model,'gall_img','gallery','Gallery'); ?>
        </div>

        <div class="form-group field-picture-gall_file required">
            <label class="control-label" for="gallery-gall_img">รูปภาพ</label>
            <?php
                $gallTime = time();
                echo Html::hiddenInput('gallTime',$gallTime);

                $optionGall['uploadUrl'] = Url::to(['gallery/upload']);
                $optionGall['uploadExtraData'] = ['gallTime' => $gallTime];
                // If update is show image
                if($model->gall_id != NULL){
                    $gallShow = Picture::findAll(['gall_id' => $model->gall_id,'active' => 1]);
                    if($gallShow != NULL){
                        $preview = [];
                        $previewConfig = [];
                        foreach ($gallShow as $gallShowItems) {
                            array_push($preview, Yii::$app->request->baseurl."/../upload/gallery/".$gallShowItems->pic_img);
                            array_push($previewConfig,['url' => url::to(['/gallery/deletegall','id' => $gallShowItems->pic_id])]);

                        }
                        $optionGall['initialPreview'] = $preview;
                        $optionGall['initialPreviewConfig'] = $previewConfig;
                        $optionGall['initialPreviewAsData'] = true;
                        $optionGall['overwriteInitial'] = false;

                    }
                }
                $optionGall['deleteUrl'] = Url::to(['gallery/deletegall']);
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