<?php
    use yii\helpers\Html;
    use yii\helpers\Url;

    $title = 'ผลงาน'; 
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
<section id="page-content" class="sidebar-left">

<div class="container">
        <div class="row">

    <!-- Sidebar-->
    <div class="sidebar col-md-3">
        <div>
            <h4 class="color-primary">ผลงาน</h4>

            <ul class="list-unstyled ul-menu-document">
                <?php
                    $i = 1;
                    foreach($init['tgdePortfolioYear'] as $item):
                      
                        $btnClass = ($item->tp_year_id == $init['tp_year_id']) ? 'btn-primary':'btn-light';
                ?>
                        <li>
                            <a class="btn <?=$btnClass; ?> btn-block btn-menu-left" href="<?=url::to(['tgde-portfolio/index','tp_year_id' => $item->tp_year_id])?>" style="white-space:normal;letter-spacing: 0px;line-height: 20px;"><?=$item->tp_year_name; ?></a>
                        </li>
                <?php 
                        $i = $i+1;
                    endforeach; 
                ?>
            </ul>
        </div>
    </div>
<!-- end: Sidebar-->

    <div class="container col-md-9">

        <div class="hr-title hr-long center" style="color:#ddd;">
            <abbr><?=$init['tgdePortfolioYearSelect']->tp_year_name; ?></abbr> 
        </div>

        <!-- Portfolio -->
        <div id="portfolio" class="grid-layout portfolio-3-columns" data-margin="30" style="overflow:hidden;">
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
                                    <a href="<?=url::to(['tgde-portfolio/view','id' => $item->tp_id]); ?>">
                                        <img alt="" src="<?=Yii::$app->request->baseUrl.'/upload/tgde-portfolio/thumb/'.$item->tp_img; ?>">
                                    </a>
                                </div>
                                <div class="post-item-description">
                                    <h2 style="min-height: 170px;">
                                        <?=HTML::a($item->tp_title,[
                                            'tgde-portfolio/view','id' => $item->tp_id
                                        ]); ?>
                                    </h2>
                                    <!-- <p>
                                        <a href="<?=url::to(['tgde-portfolio/view','id' => $item->tp_id]); ?>">
                                            <?=Yii::$app->mhelpers->subtitle($item->tp_detail, 0, 110); ?>
                                        </a>
                                    </p> -->
                                    <?=HTML::a("อ่านต่อ <i class='fa fa-arrow-right'></i>",['tgde-portfolio/view','id' => $item->tp_id],['class' => 'item-link']); ?>
                                    
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
            <a href="portfolio-infinite-scroll-2-load-tgde-portfolio?<?=$init['tp_year_link'];?>&page=1"></a>
        </div>
        <!-- end:Load next portfolio items -->

        <!-- end: Portfolio -->
    </div>

            </div>
            </div>
</section>
<!-- end: NEWS -->


