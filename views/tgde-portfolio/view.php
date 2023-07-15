<?php
    use yii\helpers\Html;
    use yii\helpers\Url;

    $title = 'ผลงาน'.$model->tgdePortfolioYear->tp_year_name;
?>
<!-- Page title -->
<section id="page-title" class="page-title-classic">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li>
                    <?= Html::a('หน้าหลัก',['site/index']) ?>
                </li>
                <li>
                    <?= Html::a($title,['tgde-portfolio/index','tp_year_id' => $model->tp_year_id]) ?>
                </li>
            </ul>
        </div>
        <div class="page-title">
            <h1><?=$title; ?></h1>
        </div>
    </div>
</section>
<!-- end: Page title -->

<!-- NEWS -->
<section class="section-tgde-portfolio">
    <div class="container">
        <div class="row">
            <!-- content -->
            <div class="content col-md-12">
                <!-- Blog -->
                <div id="blog" class="single-post">
                    <!-- Post single item-->
                    <div class="post-item">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="<?=url::to(['tgde-portfolio/view','id' => $model->tp_id]); ?>">
                                    <img alt="" src="<?=Yii::$app->request->baseUrl.'/upload/tgde-portfolio/'.$model->tp_img; ?>">
                                </a>
                            </div>
                            <div class="post-item-description">
                                <h3><?=$model->tp_title; ?></h3>
                                <div class="post-meta">
                                    <span class="post-meta-comments"><a href="#"><i class="fa fa-eye"></i><?=$model->views; ?> ผู้เข้าชม</a></span>
                                    <span class="post-meta-category">
                                        <a href="<?=url::to(['tgde-portfolio/index','tp_year_id' => $model->tp_year_id])?>"><i class="fa fa-tag"></i>
                                            <?=$model->tgdePortfolioYear->tp_year_name; ?>
                                        </a>
                                    </span>
                                    <div class="post-meta-share">
                                        <a class="btn btn-xs btn-slide btn-facebook" href="#">
                                            <i class="fa fa-facebook"></i>
                                            <span>Share</span>
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <?=$model->tp_detail; ?>
                                </div>

                                <?php if($init['is_gallery'] == true){ ?>
                                <!--Lightbox gallery -->
                                <div class="hr-title hr-long center m-t-40"><abbr>Gallery</abbr> </div>
                                <div data-lightbox="gallery" class="carousel row col-no-margin">
                                    <?php
                                        foreach($init['picture'] as $item):
                                    ?>
                                    <div class="col-md-12">
                                        <div class="grid-item">
                                            <div class="grid-item-wrap">
                                                <div class="grid-image"> <img alt="Image Lightbox" src="<?=Yii::$app->request->baseUrl.'/upload/gallery-tgde-portfolio/'.$item->pic_img; ?>" /> </div>
                                                <div class="grid-description">
                                                    <a title="" data-lightbox="gallery-item" href="<?=Yii::$app->request->baseUrl.'/upload/gallery-tgde-portfolio/'.$item->pic_img; ?>" class="">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                        endforeach; 
                                    ?>
                                </div>
                                <?php } ?>

                            </div>
                            <div class="post-navigation">
                                <?php
                                    if(isset($init['prevTgdePortfolio'])){

                                ?>
                                <a href="<?=url::to(['tgde-portfolio/view','id' => $init['prevTgdePortfolio']->tp_id]); ?>" class="post-prev">
                                    <div class="post-prev-title" style="font-size:0.8em;"><span>Previous Post</span>
                                        <?= $init['prevTgdePortfolio']->tp_title; ?>
                                    </div>
                                </a>
                                <?php } ?>

                                <a href="<?=url::to(['tgde-portfolio/index','a_type_id' => $model->tp_year_id]); ?>" class="post-all">
                                    <i class="fa fa-th"></i>
                                </a>
                                <?php
                                    if(isset($init['nextTgdePortfolio'])){

                                ?>
                                <a href="<?=url::to(['tgde-portfolio/view','id' => $init['nextTgdePortfolio']->tp_id]); ?>" class="post-next">
                                    <div class="post-next-title" style="font-size:0.8em;"><span>Next Post</span>
                                    <?= $init['nextTgdePortfolio']->tp_title; ?>
                                    </div>
                                </a>
                                <?php } ?>

                            </div>
                            
                            
                        </div>
                    </div>
                    <!-- end: Post single item-->
                </div>
            </div>
            <!-- end: content -->

            
        </div>
    </div>
</section>
<!-- end: NEWS -->


