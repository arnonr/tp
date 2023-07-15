<?php
    use yii\helpers\Html;
    use yii\helpers\Url;

    $title = $model->a_title;
?>
<!-- Page title -->
<section id="page-title" class="page-title-classic">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li>
                    <?= Html::a('หน้าหลัก',['site/index']) ?>
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
                            <div class="post-image text-center">
                                <a href="<?=url::to(['article/view','id' => $model->a_id]); ?>">
                                    <img alt="" src="<?=Yii::$app->request->baseUrl.'/upload/article/'.$model->a_img; ?>" style="width:70%">
                                </a>
                            </div>
                            <div class="post-item-description">
                            
                                
                                <div>
                                    <?=$model->a_detail; ?>
                                </div>
                                <!--Lightbox gallery -->
                                <div class="hr-title hr-long center m-t-40"><abbr>Gallery</abbr> </div>
                                <div data-lightbox="gallery" class="carousel row col-no-margin">

                                    <?php
                                        $init['picture'] = [
                                            1 => 'robot1.png',
                                            2 => 'robot2.png',
                                            3 => 'robot3.png',
                                            4 => 'robot4.png',
                                            5 => 'robot5.png',
                                            6 => 'robot6.png',
                                            7 => 'robot7.png',
                                            8 => 'robot8.png',
                                            9 => 'robot9.png',
                                            10 => 'robot10.png',
                                            11 => 'robot11.png',
                                            12 => 'robot12.png',
                                            13 => 'robot13.png',
                                            14 => 'robot14.png',
                                            15 => 'robot15.png',
                                            16 => 'robot16.png',
                                            17 => 'robot17.png',
                                            18 => 'robot18.png',
                                            19 => 'robot19.png',
                                            20 => 'robot20.png',
                                            21 => 'robot21.png',
                                        ];
                                        foreach($init['picture'] as $item):
                                    ?>
                                    <div class="col-md-12">
                                        <div class="grid-item">
                                            <div class="grid-item-wrap">
                                                <div class="grid-image"> <img alt="Image Lightbox" src="<?=Yii::$app->request->baseUrl.'/upload/research/'.$item; ?>" /> </div>
                                                <div class="grid-description">
                                                    <a title="โครงการระบบทดสอบหุ่นยนต์กรีดยางพาราอัตโนมัติพร้อมพัฒนา" data-lightbox="gallery-item" href="<?=Yii::$app->request->baseUrl.'/upload/research/'.$item; ?>" class="">
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


