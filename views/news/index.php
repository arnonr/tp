<?php
    use yii\helpers\Html;
    use yii\helpers\Url;

    $title = ($init['n_type_id'] != null) ? $init['newsTypeSelect']->n_type_name : 'ทั้งหมด'; 
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
                   ข่าว<?=$title; ?>
                </li>
            </ul>
        </div>
        <div class="page-title">
            <h1>ข่าว<?=$title; ?></h1>
        </div>
    </div>
</section>
<!-- end: Page title -->


 <!-- Page Menu -->
 <div class="page-menu menu-outline style-1">
    <div class="container">
        <!-- <div class="menu-title">เลือก<span>ประเภทข่าว</span></div> -->
        <nav>
            <ul>
                <li class='<?=($init['n_type_id'] == null)?'active':''; ?>'>
                    <?=Html::a('แสดงทั้งหมด',['news/index']); ?>
                </li>
                <?php
                    foreach($init['newsType'] as $item):
                ?>
                    <li class='<?=($init['n_type_id'] == $item->n_type_id)?'active':''; ?>'>
                        <?=Html::a($item->n_type_name,['news/index','n_type_id' => $item->n_type_id]); ?>
                    </li>
                <?php 
                    endforeach; 
                ?>
               
            </ul>
        </nav>

        <div id="menu-responsive-icon">
            <i class="fa fa-reorder"></i>
        </div>

    </div>
</div>
<!-- end: Page Menu -->

<!-- NEWS -->
<section class="section-news">
    <div class="container">

        <!-- Portfolio -->
        <div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="30" style="overflow:hidden;">
            <?php
                $i = 1;
                foreach($model as $item):
            ?>
                <!-- portfolio item -->
                
                <div 
                    class="news-item portfolio-item img-zoom">
                    <div class="portfolio-item-wrap" >
                        <!-- Post item-->
                        <div class="post-item border">
                            <div class="post-item-wrap">
                                <div class="post-image">
                                    <a href="<?=url::to(['news/view','id' => $item->n_id]); ?>">
                                        <img alt="" src="<?=Yii::$app->request->baseUrl.'/upload/news/thumb/'.$item->n_img; ?>">
                                    </a>
                                </div>
                                <div class="post-item-description">
                                    <h2 class="head-post">
                                        <?=HTML::a(Yii::$app->mhelpers->subtitle1($item->n_title,0, 105),[
                                            'news/view','id' => $item->n_id
                                        ]); ?>
                                    </h2>
                                    <p>
                                    <a href="<?=url::to(['news/view','id' => $item->n_id]); ?>">
                                        <?=Yii::$app->mhelpers->subtitle($item->n_detail, 0, 110); ?>
                                        </a>
                                    </p>
                                    <?=HTML::a("อ่านต่อ <i class='fa fa-arrow-right'></i>",['news/view','id' => $item->n_id],['class' => 'item-link']); ?>
                                    
                                    <span class="tag-news">
                                        <i class="fa fa-tag"></i> <?=$item->newsType->n_type_name; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- end: Post item-->
                    </div>
                </div>
                <!-- end : portfolio item -->
            <?php
                $i++;
                endforeach;
            ?>
        </div>
        
        <!-- Load next portfolio items -->
     
        <div id="pagination" class="infinite-scroll">
            <a href="portfolio-infinite-scroll-2-load-news?<?=$init['n_type_link'];?>&page=1"></a>
        </div>
        <!-- end:Load next portfolio items -->

        <!-- end: Portfolio -->
    </div>
</section>
<!-- end: NEWS -->


