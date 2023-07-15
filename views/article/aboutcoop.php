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
<section class="section-article">
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
                                <a href="<?=url::to(['article/view','id' => $model->a_id]); ?>">
                                    <img alt="" src="<?=Yii::$app->request->baseUrl.'/upload/article/'.$model->a_img; ?>">
                                </a>
                            </div>
                            <div class="post-item-description">
                            
                                <div class="post-meta">
                                    <span class="post-meta-comments"><a href="#"><i class="fa fa-eye"></i><?=$model->views; ?> Views</a></span>
                                    
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


