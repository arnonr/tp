<?php
use yii\helpers\Html;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
$this->registerJsFile($directoryAsset.'/js/custom_freedom.js');
?>

<!-- Add & Search -->
<div style="text-align:right;">
    <p>
        <?= Html::a('<i class="fa fa-plus"></i> ADD', '#collapseAdd', [
                'class' => 'btn waves-effect waves-light btn-success',
                'role' => 'button',
                'data-toggle' => 'collapse',
                'aria-expanded' => 'false',
                'aria-controls' => 'collapseAdd',
            ]);
        ?>
    </p>

    <!-- Search -->
    <div class="collapse" id="collapseAdd" style="text-align:left;">

        <div class="card border-success">
            <div class="card-header bg-success">
                <h4 class="m-b-0 text-white"><i class="fa fa-plus"></i></h4>
            </div>
            <div class="card-body">
                <?= $this->render($controller.'/_add', [
                      'model' => $model,
                      'news' => $news,
                    ]) 
                ?>
            </div>
        </div>
    </div>
</div>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-rounded">
        <?= Yii::$app->session->getFlash('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
<?php endif; ?>