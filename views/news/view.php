<?php
    use yii\helpers\Html;
    use yii\helpers\Url;

    $title = 'ข่าว'.$model->newsType->n_type_name;
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
                   <?=$title; ?>
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
<section class="section-news sidebar-right">
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
                                <a href="<?=url::to(['news/view','id' => $model->n_id]); ?>">
                                    <img alt="" src="<?=Yii::$app->request->baseUrl.'/upload/news/thumb/'.$model->n_img; ?>">
                                </a>
                            </div>
                            <div class="post-item-description">
                                <h3><?=$model->n_title; ?></h3>
                                <div class="post-meta">
                                    <span class="post-meta-comments"><a href="#"><i class="fa fa-eye"></i>33 ผู้เข้าชม</a></span>
                                    <span class="post-meta-category">
                                        <a href="<?=url::to(['/news/index','n_type_id' => $model->n_type_id])?>"><i class="fa fa-tag"></i>
                                            <?=$model->newsType->n_type_name; ?>
                                        </a>
                                    </span>
                                    <div class="post-meta-share">
                                        <!-- <a class="btn btn-xs btn-slide btn-facebook" id="shareBtn">
                                            <i class="fa fa-facebook"></i>
                                            <span>Share</span>
                                        </a> -->

                                        <!-- Load Facebook SDK for JavaScript -->
                                        <!-- <a href="http://www.facebook.com/sharer.php?u=https://www.tgde.kmutnb.ac.th/news/view?id=81" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"> Share</a> -->

                                        <a onClick="window.open('http://www.facebook.com/sharer.php?u=https://www.tgde.kmutnb.ac.th/news/view?id=81', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)">Share</a>

                                        <!-- <div id="shareBtn" class="btn btn-success clearfix">Share Dialog</div> -->

                                        <!-- <a class="btn btn-xs btn-slide btn-googleplus" href="mailto:#" data-width="80">
                                            <i class="fa fa-envelope"></i>
                                            <span>Mail</span>
                                        </a> -->
                                    </div>
                                </div>
                                <div>
                                    <?=$model->n_detail; ?>
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
                                                <div class="grid-image"> <img alt="Image Lightbox" src="<?=Yii::$app->request->baseUrl.'/upload/gallery/'.$item->pic_img; ?>" /> </div>
                                                <div class="grid-description">
                                                    <a title="" data-lightbox="gallery-item" href="<?=Yii::$app->request->baseUrl.'/upload/gallery/'.$item->pic_img; ?>" class="">
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
                                    if(isset($init['prevNews'])){

                                ?>
                                <a href="<?=url::to(['news/view','id' => $init['prevNews']->n_id]); ?>" class="post-prev">
                                    <div class="post-prev-title" style="font-size:0.8em;"><span>Previous Post</span>
                                        <?= $init['prevNews']->n_title; ?>
                                    </div>
                                </a>
                                <?php } ?>

                                <a href="<?=url::to(['news/index','n_type_id' => $model->n_type_id]); ?>" class="post-all">
                                    <i class="fa fa-th"></i>
                                </a>
                                <?php
                                    if(isset($init['nextNews'])){

                                ?>
                                <a href="<?=url::to(['news/view','id' => $init['nextNews']->n_id]); ?>" class="post-next">
                                    <div class="post-next-title" style="font-size:0.8em;"><span>Next Post</span>
                                    <?= $init['nextNews']->n_title; ?>
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
                    <h4 class="widget-title color-primary">ข่าวล่าสุด</h4>
                    <div class="post-thumbnail-list">
                        <?php
                            foreach($init['lastestNews'] as $item):
                        ?>
                        <div class="post-thumbnail-entry">
                            <img alt="" src="<?=Yii::$app->request->baseUrl.'/upload/news/thumb/'.$item->n_img; ?>">
                            <div class="post-thumbnail-content">
                                <a href="<?=url::to(['news/view','id' => $item->n_id]); ?>"><?=$item->n_title; ?></a>
                                <span class="post-category"><i class="fa fa-tag"></i> <?=$item->newsType->n_type_name; ?></span>
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

<script type="text/javascript">
	//facebook share and like
    window.fbAsyncInit = function() {
            FB.init({
                appId: '205811777462528',
                xfbml: true,
                version: 'v2.7'
            });
        };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>