<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
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
                    <a href="#">ข่าวประชาสัมพันธ์</a> 
                </li>
            </ul>
        </div>
        <div class="page-title">
            <h1>ข่าวประชาสัมพันธ์</h1>
        </div>
    </div>
</section>
<!-- end: Page title -->


 <!-- Page Menu -->
 <div class="page-menu menu-outline style-1">
    <div class="container">
        <!-- <div class="menu-title">Portfolio <span>Options</span></div> -->
        <nav>
            <ul>
                <li>
                    <?=Html::a('แสดงทั้งหมด',['news/index']); ?>
                </li>
                <?php
                    foreach($init['newsType'] as $item):
                ?>
                    <li>
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
        <!-- <div class="heading heading-left m-b-40 heading-new">
            <h2>ข่าวประชาสัมพันธ์</h2>
        </div> -->
        <!-- Portfolio Filter -->
        <nav class="grid-filter gf-creative" data-layout="#portfolio">
            <ul class="news-menu">
                <li class="active "><a href="#" data-category=".news-all">แสดงทั้งหมด</a></li>
                <?php
                    foreach($init['newsType'] as $item):
                ?>
                    <li>
                        <?=Html::a($item->n_type_name,'#',[
                            'data-category' => '.news-'.$item->tag,
                        ]); ?>
                    </li>
                <?php 
                    endforeach; 
                ?>
            </ul>
            <div class="grid-active-title">แสดงทั้งหมด</div>
        </nav>
        <!-- end: Portfolio Filter -->

        <!-- Portfolio -->
        <div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="30" style="overflow:hidden;">

            <?php
                $i = 1;
                foreach($init['news'] as $item):
                    $classAll = ($i<=8)?'news-all':'';
                    $display = ($i<=8)? 'inherit': 'none !important';

            ?>
                <!-- portfolio item -->
                
                <div 
                    class="news-item portfolio-item img-zoom news-<?=$item->newsType->tag ?> <?=$classAll; ?>" style="display:<?=$display; ?>">
                    <div class="portfolio-item-wrap" >
                        <!-- Post item-->
                        <div class="post-item border">
                            <div class="post-item-wrap">
                                <div class="post-image">
                                    <a href="#">
                                        <img alt="" src="<?=Yii::$app->request->baseUrl.'/upload/news/thumb/'.$item->n_img; ?>">
                                        
                                    </a>
                                </div>
                                <div class="post-item-description">
                                    <h2 class="head-post">
                                        <?=HTML::a($item->n_title,[
                                            'news/view','id' => $item->n_id
                                        ]); ?>
                                    </h2>
                                    <p>
                                        <?=Yii::$app->mhelpers->subtitle($item->n_detail, 0, 110); ?>
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
<!-- portfolio-infinite-scroll-2.html -->
        <!-- Load next portfolio items -->
        <div id="pagination" class="infinite-scroll">
            <a href="portfolio-infinite-scroll-2-load-news?page=1"></a>
        </div>
        <!-- end:Load next portfolio items -->

        <!-- end: Portfolio -->
    </div>
</section>
<!-- end: NEWS -->

<script>
    $(document).ready(function(){
        var k = 1;
        $('ul.news-menu > li > a').click(function(){
            if(k == 1){
                $( ".news-item" ).each(function() {
                    $(this).css('opacity','1');
                    $(this).css('transform','translate3d(0px, 0px, 0px)');
                    $(this).css('display','inherit');
                });
                k = k + 1;
            }

            let newsMenu = $(this).html();
            $('span.text-news-all').html(newsMenu);
            if(newsMenu == 'แสดงทั้งหมด'){
                $('span.text-news-all').html('');
            }else{
                $('span.text-news-all').html(newsMenu);
            }
        });


        setTimeout(() => {
            var i = 1;
            $( ".news-item" ).each(function() {
                if(i > 8){
                    $(this).css('opacity','0');
                    $(this).css('transform','translate3d(0px, 60px, 0px)');
                    $(this).css('display','none');
                }
                i = i + 1;
            });
        
        }, 1000);


    })
</script>   