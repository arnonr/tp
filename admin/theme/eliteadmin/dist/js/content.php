<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
use yii\helpers\Html;
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title"><?= Html::encode($this->title) ?></h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <?php  
                    echo Breadcrumbs::widget([
                        'itemTemplate' => "<li>{link}</li>\n", // template for all links
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []
                        // [
                            // [
                            //     'label' => 'Post Category',
                            //     'url' => ['post-category/view', 'id' => 10],
                            //     'template' => "<li><b>{link}</b></li>\n", // template for this link only
                            // ],
                            // ['label' => 'Sample Post', 'url' => ['post/edit', 'id' => 1]],
                            // 'Edit',
                        // ],
                    ]);
                ?>
                <!-- <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Dashboard 1</li>
                </ol> -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        
        <?=$content; ?>

    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2019 &copy; GREEN KMUTNB </footer>
</div>
<!-- /#page-wrapper -->