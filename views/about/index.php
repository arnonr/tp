<?php
    use yii\helpers\Html;
    use yii\helpers\Url;

    $title = $model->ab_title;
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

<!-- ABOUT -->
<section class="section-about">
    <div class="container">
        <div class="row">
            <!-- content -->
            <div class="content col-md-12">
                <!-- Blog -->
                <div id="blog" class="single-post">
                    <!-- Post single item-->
                    <div class="post-item">
                        <?=$model->ab_detail; ?>
                    </div>
                    <!-- end: Post single item-->
                </div>
            </div>
            <!-- end: content -->

        </div>
    </div>
</section>
<!-- end: ABOUT -->


