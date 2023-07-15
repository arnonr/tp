<?php
    use yii\helpers\Html;
    use yii\helpers\Url;

    $title = 'สำนักงาน'; 
    $dirAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/polo/dist');
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


<!-- OFFICE -->
<section class="section-office">
    <div class="container">

        <!-- office -->
        <div id="office" class="grid-layout portfolio-3-columns" data-margin="30" style="overflow:hidden;">
                <!-- Portfolio item -->
                <div 
                    class="news-item portfolio-item img-zoom">
                    <div class="portfolio-item-wrap" >
                        <!-- Post item-->
                        <div class="post-item border">
                            <div class="post-item-wrap">
                              <!--   <div class="post-image">
                                    <a href="#">
                                        <img alt="" src="#">
                                    </a>
                                </div> -->
                                <div class="post-item-description">
                                    <h2 class="">
                                        <?=HTML::a('เอกสารดาวน์โหลด',[
                                            'document/index','doc_type_main_id' => 1
                                        ]); ?>
                                    </h2>
                                    <p>
                                        <a href="<?=url::to(['document/index','doc_type_main_id' => 1]); ?>">
                                            เอกสารสำหรับบุคลากรภายในสถาบันสหกิจศึกษาฯ
                                        </a>
                                    </p>
                                    <?=HTML::a("คลิก <i class='fa fa-arrow-right'></i>",['document/index','doc_type_main_id' => 1],['class' => 'item-link']); ?>
                                </div>
                            </div>
                        </div>
                        <!-- end: Post item-->
                    </div>
                </div>
                <!-- end : portfolio item -->

                <!-- Portfolio item -->
                <div 
                    class="news-item portfolio-item img-zoom">
                    <div class="portfolio-item-wrap" >
                        <!-- Post item-->
                        <div class="post-item border">
                            <div class="post-item-wrap">
                               <!--  <div class="post-image">
                                    <a href="#">
                                        <img alt="" src="#">
                                    </a>
                                </div> -->
                                <div class="post-item-description">
                                    <h2 class="">
                                        <?=HTML::a('ระบบสารบรรณอิเล็กทรอนิกส์','https://www.tgde.kmutnb.ac.th/eoffice/',['target' => '_blank']); ?>
                                    </h2>
                                    <p>
                                        <a href="https://www.tgde.kmutnb.ac.th/eoffice/" target="_blank">
                                        ใช้ในการรับส่งเอกสารภายในและภายนอกหน่วยงาน
                                        </a>
                                    </p>
                                    <?=HTML::a("คลิก <i class='fa fa-arrow-right'></i>",'https://www.tgde.kmutnb.ac.th/eoffice/',['class' => 'item-link','target' => '_blank']); ?>
                                </div>
                            </div>
                        </div>
                        <!-- end: Post item-->
                    </div>
                </div>
                <!-- end : portfolio item -->

                <!-- Portfolio item -->
                <div 
                    class="news-item portfolio-item img-zoom">
                    <div class="portfolio-item-wrap" >
                        <!-- Post item-->
                        <div class="post-item border">
                            <div class="post-item-wrap">
                               <!--  <div class="post-image">
                                    <a href="https://www.tgde.kmutnb.ac.th/hrm/">
                                        <img alt="" src="">
                                    </a>
                                </div> -->
                                <div class="post-item-description">
                                    <h2 class="">
                                        <?=HTML::a('ระบบบุคลากร','https://www.tgde.kmutnb.ac.th/hrm/',['target' => '_blank']); ?>
                                    </h2>
                                    <p>
                                        <a href="https://www.tgde.kmutnb.ac.th/hrm/" target="_blank">
                                            ใช้ในการบริหารจัดการข้อมูลบุคลากรภายในหน่วยงาน
                                        </a>
                                    </p>
                                    <?=HTML::a("คลิก <i class='fa fa-arrow-right'></i>",'https://www.tgde.kmutnb.ac.th/hrm/',['class' => 'item-link','target' => '_blank']); ?>
                                </div>
                            </div>
                        </div>
                        <!-- end: Post item-->
                    </div>
                </div>
                <!-- end : portfolio item -->

                <!-- Portfolio item -->
                <div 
                    class="news-item portfolio-item img-zoom">
                    <div class="portfolio-item-wrap" >
                        <!-- Post item-->
                        <div class="post-item border">
                            <div class="post-item-wrap">
                               <!--  <div class="post-image">
                                    <a href="#">
                                        <img alt="" src="#">
                                    </a>
                                </div> -->
                                <div class="post-item-description">
                                    <h2 class="">
                                        <?=HTML::a('ระบบการจัดการโครงการ','https://www.tgde.kmutnb.ac.th/eproject/',['target' => '_blank']); ?>
                                    </h2>
                                    <p>
                                        <a href="https://www.tgde.kmutnb.ac.th/eproject/" target="_blank">
                                        ใช้ในการบริหารจัดการและติดตามการดำเนินงานในแต่ละโครงการ
                                        </a>
                                    </p>
                                    <?=HTML::a("คลิก <i class='fa fa-arrow-right'></i>",'https://www.tgde.kmutnb.ac.th/eproject/',['class' => 'item-link','target' => '_blank']); ?>
                                </div>
                            </div>
                        </div>
                        <!-- end: Post item-->
                    </div>
                </div>
                <!-- end : portfolio item -->

                <!-- Portfolio item -->
                <div 
                    class="news-item portfolio-item img-zoom">
                    <div class="portfolio-item-wrap" >
                        <!-- Post item-->
                        <div class="post-item border">
                            <div class="post-item-wrap">
                             <!--    <div class="post-image">
                                    <a href="#">
                                        <img alt="" src="#">
                                    </a>
                                </div> -->
                                <div class="post-item-description">
                                    <h2 class="">
                                        <?=HTML::a('ระบบครุภัณฑ์','https://www.tgde.kmutnb.ac.th/parcel/',['target' => '_blank']); ?>
                                    </h2>
                                    <p>
                                        <a href="https://www.tgde.kmutnb.ac.th/parcel/" target="_blank">
                                        ใช้บริหารจัดการและตรวจสอบครุภัณฑ์ภายในหน่วยงาน
                                        </a>
                                    </p>
                                    <?=HTML::a("คลิก <i class='fa fa-arrow-right'></i>",'https://www.tgde.kmutnb.ac.th/parcel/',['class' => 'item-link','target' => '_blank']); ?>
                                </div>
                            </div>
                        </div>
                        <!-- end: Post item-->
                    </div>
                </div>
                <!-- end : portfolio item -->

                 <!-- Portfolio item -->
                <div 
                    class="news-item portfolio-item img-zoom">
                    <div class="portfolio-item-wrap" >
                        <!-- Post item-->
                        <div class="post-item border">
                            <div class="post-item-wrap">
                              <!--   <div class="post-image">
                                    <a href="#">
                                        <img alt="" src="#">
                                    </a>
                                </div> -->
                                <div class="post-item-description">
                                    <h2 class="">
                                        <?=HTML::a('ระบบติดตามรายงาน','https://www.tgde.kmutnb.ac.th/dashboard/',['target' => '_blank']); ?>
                                    </h2>
                                    <p>
                                        <a href="https://www.tgde.kmutnb.ac.th/dashboard/" target="_blank">
                                        ใช้ในการติดตามรายงานคำรับรอง และ รายงานประเมินตนเอง(SAR)
                                        </a>
                                    </p>
                                    <?=HTML::a("คลิก <i class='fa fa-arrow-right'></i>",'https://www.tgde.kmutnb.ac.th/dashboard/',['class' => 'item-link','target' => '_blank']); ?>
                                </div>
                            </div>
                        </div>
                        <!-- end: Post item-->
                    </div>
                </div>
                <!-- end : portfolio item -->

        </div>
        
    </div>
</section>
<!-- end: NEWS -->


