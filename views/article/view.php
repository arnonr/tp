<?php
    use yii\helpers\Html;
    use yii\helpers\Url;

    $title = $model->articleType->a_type_name;
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
                    <?= Html::a($title,['article/index','a_type_id' => $model->a_type_id]) ?>
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
<section class="section-article sidebar-right">
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
                                <a href="<?=url::to(['article/view','id' => $model->a_id]); ?>">
                                    <img alt="" src="<?=Yii::$app->request->baseUrl.'/upload/article/'.$model->a_img; ?>">
                                </a>
                            </div>
                            <div class="post-item-description">
                                <h3><?=$model->a_title; ?></h3>
                                <div class="post-meta">
                                    <span class="post-meta-comments"><a href="#"><i class="fa fa-eye"></i><?=$model->views; ?> Views</a></span>
                                    <span class="post-meta-category">
                                        <a href="<?=url::to(['/article/index','a_type_id' => $model->a_type_id])?>"><i class="fa fa-tag"></i>
                                            <?=$model->articleType->a_type_name; ?>
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
                                    <?=$model->a_detail; ?>
                                </div>

                            </div>
                            <div class="post-navigation">
                                <?php
                                    if(isset($init['prevArticle'])){

                                ?>
                                <a href="<?=url::to(['article/view','id' => $init['prevArticle']->a_id]); ?>" class="post-prev">
                                    <div class="post-prev-title" style="font-size:0.8em;"><span>Previous Post</span>
                                        <?= $init['prevArticle']->a_title; ?>
                                    </div>
                                </a>
                                <?php } ?>

                                <a href="<?=url::to(['article/index','a_type_id' => $model->a_type_id]); ?>" class="post-all">
                                    <i class="fa fa-th"></i>
                                </a>
                                <?php
                                    if(isset($init['nextArticle'])){

                                ?>
                                <a href="<?=url::to(['article/view','id' => $init['nextArticle']->a_id]); ?>" class="post-next">
                                    <div class="post-next-title" style="font-size:0.8em;"><span>Next Post</span>
                                    <?= $init['nextArticle']->a_title; ?>
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

             <!-- Sidebar-->
             <div class="sidebar col-md-3">
                <!--Tabs with Posts-->
                <div class="widget ">
                    <h4 class="widget-title color-primary">ล่าสุด</h4>
                    <div class="post-thumbnail-list">
                        <?php
                            foreach($init['lastestArticle'] as $item):
                        ?>
                        <div class="post-thumbnail-entry">
                            <img alt="" src="<?=Yii::$app->request->baseUrl.'/upload/article/thumb/'.$item->a_img; ?>">
                            <div class="post-thumbnail-content">
                                <a href="<?=url::to(['article/view','id' => $item->a_id]); ?>"><?=$item->a_title; ?></a>
                                <span class="post-category"><i class="fa fa-tag"></i> <?=$item->articleType->a_type_name; ?></span>
                            </div>
                        </div>
                        <?php
                            endforeach;
                        ?>
                    </div>
                </div>
                <!--End: Tabs with Posts-->
            </div>
            <!-- end: Sidebar-->
        </div>
    </div>
</section>
<!-- end: NEWS -->


