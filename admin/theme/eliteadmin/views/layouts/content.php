<?php
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
?>

<div class="page-wrapper">
    <div class="container-fluid">
        <!-- BREADCRUMB -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor"><?= Html::encode($this->title) ?></h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <?php  
                        echo Breadcrumbs::widget([
                            'tag' => 'ol',
                            'itemTemplate' => "<li class='breadcrumb-item'>{link}</li>\n",
                            'activeItemTemplate' => "<li class='breadcrumb-item active'>{link}</li>\n",
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []
                        ]);
                    ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <?=$content; ?>
            </div>
        </div>
    </div>
</div>