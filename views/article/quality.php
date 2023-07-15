<?php
    use yii\helpers\Html;
    use yii\helpers\Url;

    $title = 'งานประกันคุณภาพ'
?>
<!-- Page title -->
<section id="page-title" class="page-title-classic">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li>
                    <?=Html::a('หน้าหลัก',['site/index']) ?>
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
<section class="section-article">
    <div class="container">

        <!-- Portfolio -->
        <div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="30" style="overflow:hidden;">
        <div 
                    class="article-item portfolio-item img-zoom">
                    <div class="portfolio-item-wrap" >
                        <!-- Post item-->
                        <div class="post-item border">
                            <div class="post-item-wrap">
                                <div class="post-image">
                                    <a href="<?=url::to(['article/msteams']); ?>">
                                        <img alt="" src="https://www.itcoolgang.com/wp-content/uploads/Teams-Cover-Hero.jpg">
                                    </a>
                                </div>
                                <div class="post-item-description">
                                    <h2 class="head-post" style="min-height:0px;">
                                        <?=HTML::a('Microsoft Teams',[
                                            'article/msteams']); ?>
                                    </h2>
                                   
                                    <p>
                                        <a href="<?=url::to(['article/msteams']); ?>">
                                        การใช้งานและวิดีโอสอนการใช้งานโปรแกรม Microsoft Teams สำหรับการประชุม การจัดเก็บไฟล์ การแชร์ไฟล์เพื่อการแก้ไขพร้อมกันเป็นหมู่คณะ สำหรับพนักงานมหาวิทยาลัยสายสนับสนุน
                                        </a>
                                    </p>

                                    <?=HTML::a("อ่านต่อ <i class='fa fa-arrow-right'></i>",['article/msteams'],['class' => 'item-link']); ?>
                               
                                </div>
                            </div>
                        </div>
                        <!-- end: Post item-->
                    </div>
                </div>
        </div>
        

        <!-- end: Portfolio -->
    </div>
</section>
<!-- end: NEWS -->


