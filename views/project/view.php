<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->articleType->a_type_name;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/polo/dist');
$upload_path = Yii::$app->request->baseurl.'/upload';
?>

<!-- Page title -->
<section id="page-title" class="page-title-classic" style="background-image: url('<?=$directoryAsset.'/img/bg_title.jpg' ?>');">
    <div class="container">
            <ol class="breadcrumb text-center">
              <li><a href="<?=url::to(['site/index'])?>">HOME</a> </li>
              <li><a href="<?=url::to(['article/index','a_type_id' => $model->a_type_id]); ?>"><?=$this->title; ?></a> </li>
              <!-- <li class="active"><?=$model->a_title; ?></li> -->
            </ol>
        <div class="page-title">
            <h1><?=$this->title; ?></h1>
            <!-- <span></span> -->
        </div>
    </div>
</section>
<!-- end: Page title -->


<!-- Page Content -->
<section id="page-content" class="sidebar-right">
    <div class="container">
        <div class="row">
            <!-- content -->
            <div class="content col-md-9">
                <!-- Blog -->
                <div id="blog" class="single-post">
                    <!-- Post single item-->
                    <div class="post-item">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="#">
                                    <?=Html::img($upload_path.'/article/thumb/'.$model->a_img,[
                                        'alt' => $model->a_title,
                                        'title' => $model->a_title,
                                    ]) ?>
                                </a>
                            </div>
                            <div class="post-item-description">
                                <h2><?=$model->a_title; ?></h2>
                                <div class="post-meta">

                                    <span class="post-meta-date"><i class="fa fa-calendar-o"></i><?=Yii::$app->Formatter->asDate($model->create); ?></span>
                                    <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i><?=$model->views; ?> Views</a></span>
                                    <span class="post-meta-category"><a href=""><i class="fa fa-tag"></i><?=$model->articleType->a_type_name; ?></a></span>

                                    <div class="post-meta-share">
                                        <a class="btn btn-xs btn-slide btn-facebook" href="#">
                                            <i class="fa fa-facebook"></i>
                                            <span>Share</span>
                                        </a>
                                    </div>
                                </div>
                                <?=$model->a_detail; ?>

                            </div>
                        </div>
                    </div>
                    <!-- end: Post single item-->
                </div>

            </div>
            <!-- end: content -->

            <!-- Sidebar-->
            <div class="sidebar col-md-3">
                    <!--Tabs with Posts-->
                    <div class="widget">
                        <div id="tabs-01" class="tabs simple">
                            <ul class="tabs-navigation">
                                <li class="active"><a href="#tab1">Populars Article</a> </li>
                            </ul>
                            <div class="tabs-content">
                                <div class="tab-pane active" id="tab1">
                                    <?php foreach ($popular as $pop) { ?>
                                    <div class="post-thumbnail-list">
                                        <div class="post-thumbnail-entry">
                                            <?=Html::img($upload_path.'/article/thumb/'.$pop->a_img,[
                                                'alt' => $pop->a_title,
                                                'title' => $pop->a_title,
                                            ]) ?>

                                            <div class="post-thumbnail-content">
                                                <a href="<?=url::to(['article/view','id' => $pop->a_id])?>"><?=$pop->a_title; ?></a>
                                                <span class="post-date"><i class="fa fa-clock-o"></i> <?=Yii::$app->Formatter->asDate($pop->create) ?></span>
                                              
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End: Tabs with Posts-->

                    <!--Tabs with Posts-->
                    <div class="widget">
                        <div id="tabs-01" class="tabs simple">
                            <ul class="tabs-navigation">
                                <li class="active"><a href="#tab1">Portfolio</a> </li>
                            </ul>
                            <div class="tabs-content">
                                <div class="tab-pane active" id="tab1">
                                    <?php foreach ($port as $pt) { ?>
                                    <div class="post-thumbnail-list">
                                        <div class="post-thumbnail-entry">
                                            <?=Html::img($upload_path.'/portfolio/thumb/'.$pt->p_img,[
                                                'alt' => $pt->p_title,
                                                'title' => $pt->p_title,
                                            ]) ?>

                                            <div class="post-thumbnail-content">
                                                <a href="<?=url::to(['portfolio/view','id' => $pt->p_id])?>"><?=$pt->p_title; ?></a>
                                                <span class="post-date"><i class="fa fa-clock-o"></i> <?=Yii::$app->Formatter->asDate($pt->create) ?></span>
                                                
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End: Tabs with Posts-->
                </div>
            <!-- end: sidebar-->
        </div>
    </div>
</section>
<!-- end: Page Content -->