<?php
use yii\helpers\Html;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
$this->registerJsFile($directoryAsset.'/js/custom_freedom.js');
?>

<!-- Add & Search -->
<div style="text-align:right;">
    <p>
        <?php
            if($text_add != ''){
                if($controller == 'portfolio'){
                    echo Html::a('<i class="fa fa-plus"></i> '.$text_add,['/'.$controller.'/create?port_sub_pro_id='.$searchModel->port_sub_pro_id],['class' => 'btn waves-effect waves-light btn-success'
                    ]);
                }else if($controller == 'portfolio-sub-project'){
                    echo Html::a('<i class="fa fa-plus"></i> '.$text_add,['/'.$controller.'/create?port_pro_id='.$searchModel->port_pro_id],['class' => 'btn waves-effect waves-light btn-success'
                    ]);
                }else if($controller == 'article'){
                    echo Html::a('<i class="fa fa-plus"></i> '.$text_add,['/'.$controller.'/create?a_type_id='.$searchModel->a_type_id],['class' => 'btn waves-effect waves-light btn-success'
                    ]);
                }else if($controller == 'document'){
                    echo Html::a('<i class="fa fa-plus"></i> '.$text_add,['/'.$controller.'/create?doc_type_main_id='.$searchModel->doc_type_main_id],['class' => 'btn waves-effect waves-light btn-success'
                    ]);
                }else{
                    echo Html::a('<i class="fa fa-plus"></i> '.$text_add,['/'.$controller.'/create'],['class' => 'btn waves-effect waves-light btn-success'
                    ]);
                }
                
            }
        ?>

        <?= Html::a('<i class="fa fa-search"></i>', '#collapseSearch', [
                'class' => 'btn waves-effect waves-light btn-warning',
                'role' => 'button',
                'data-toggle' => 'collapse',
                'aria-expanded' => 'false',
                'aria-controls' => 'collapseSearch',
            ]);
        ?>
    </p>

    <!-- Search -->
    <div class="collapse" id="collapseSearch" style="text-align:left;">

        <div class="card border-warning">
            <div class="card-header bg-warning">
                <h4 class="m-b-0 text-white"><i class="fa fa-search"></i></h4>
            </div>
            <div class="card-body">
                <?= $this->render($controller.'/_search', [
                      'model' => $searchModel,
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