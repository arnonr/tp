<?php
    use yii\helpers\Html;
    use yii\helpers\Url;

    $title = $init['articleTypeSelect']->a_type_name; 
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
            <?php
                $i = 1;
                foreach($model as $item):
            ?>
                <!-- portfolio item -->
                
                <div 
                    class="article-item portfolio-item img-zoom">
                    <div class="portfolio-item-wrap" >
                        <!-- Post item-->
                        <div class="post-item border">
                            <div class="post-item-wrap">
                                <div class="post-image">
                                    <a href="<?=url::to(['article/view','id' => $item->a_id]); ?>">
                                        <img alt="" src="<?=Yii::$app->request->baseUrl.'/upload/article/thumb/'.$item->a_img; ?>">
                                    </a>
                                </div>
                                <div class="post-item-description">
                                    <h2 class="head-post">
                                        <?=HTML::a($item->a_title,[
                                            'article/view','id' => $item->a_id
                                        ]); ?>
                                    </h2>
                                    <?php
                                        if($init['articleTypeSelect']->a_type_id != 4){
                                    ?>
                                    <p>
                                        <a href="<?=url::to(['article/view','id' => $item->a_id]); ?>">
                                            <?=Yii::$app->mhelpers->subtitle($item->a_detail, 0, 110); ?>
                                        </a>
                                    </p>
                                        <?php } ?>
                                    <?=HTML::a("อ่านต่อ <i class='fa fa-arrow-right'></i>",['article/view','id' => $item->a_id],['class' => 'item-link']); ?>
                               
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
            <a href="portfolio-infinite-scroll-2-load-article?<?=$init['a_type_link'];?>&page=1"></a>
        </div>
        <!-- end:Load next portfolio items -->

        <!-- end: Portfolio -->
    </div>
</section>
<!-- end: NEWS -->


