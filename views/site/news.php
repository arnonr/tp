<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- NEWS -->
<section class="section-news">
    <div class="container">
        <div class="heading heading-left m-b-40 heading-new">
            <h2>ข่าวประชาสัมพันธ์</h2>
        </div>
        <!-- Portfolio Filter -->
        <nav class="grid-filter gf-creative" data-layout="#portfolio">
            <ul class="news-menu">
                <li class="active "><a href="#" data-category=".news-all" data-n-type-id='null'>ข่าวทั้งหมด</a></li>
                <?php
                    foreach($newsType as $item):
                ?>
                    <li>
                        <?=Html::a($item->n_type_name,'#',[
                            'data-category' => '.news-'.$item->tag,
                            'data-n-type-id' => $item->n_type_id,
                        ]); ?>
                    </li>
                <?php 
                    endforeach; 
                ?>
            </ul>
            <div class="grid-active-title">ข่าวทั้งหมด</div>
        </nav>
        <!-- end: Portfolio Filter -->

        <!-- Portfolio -->
        <div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="30" style="overflow:hidden;">

            <?php
                $i = 1;
                foreach($news as $item):
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
                                    <a href="<?=url::to(['news/view','id' =>$item->n_id])?>">
                                        <img alt="" src="<?=Yii::$app->request->baseUrl.'/upload/news/thumb/'.$item->n_img; ?>">
                                        
                                    </a>
                                </div>
                                <div class="post-item-description">
                                    <h2 class="head-post">
                                        <?=HTML::a(Yii::$app->mhelpers->subtitle1($item->n_title,0, 105),[
                                            'news/view','id' => $item->n_id
                                        ]); ?>
                                    </h2>
                                   <!--  <p><a href="<?=url::to(['news/view','id' =>$item->n_id])?>">
                                        <?=Yii::$app->mhelpers->subtitle($item->n_detail, 0, 110); ?>
                                        </a>
                                    </p> -->
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
        <div class="div-btn-news text-right">
            <a href="<?=url::to(['news/index','n_type_id' => null])?>" class="a-news-all">
                <button type="button" class="btn btn-rounded btn-outline">
                ข่าว<span class="text-news-all"></span> <i class="fa fa-arrow-right"></i>
                </button>
            </a>
        </div>
        <!-- end: Portfolio -->
    </div>
</section>
<!-- end: NEWS -->

<script>
$(document).ready(function(){
    var k = 1;
    $('ul.news-menu > li > a').click(function(){
        var nTypeId = $(this).data('n-type-id');
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
        if(newsMenu == 'ALL News'){
            $('span.text-news-all').html('');
            $('a.a-news-all').attr('href', "<?=url::to(['news/index','n_type_id' => null])?>");
        }else{
            $('span.text-news-all').html(newsMenu);
            $('a.a-news-all').attr('href', "<?=url::to(['news/index'])?>"+"?n_type_id=" + nTypeId);
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