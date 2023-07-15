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
<section id="page-content" class="sidebar-left">

<div class="container">
        <div class="row">

    <!-- Sidebar-->
    <div class="sidebar col-md-3">
        <div>
            <h4 class="color-primary">งานบริการผลิตสื่อ</h4>

            <ul class="list-unstyled ul-menu-document">
                <?php
                    $i = 1;
                    foreach($init['articleTypeSub'] as $key => $item):
                        $btnClass = ($item->a_type_sub_id == $init['a_type_sub__id']) ? 'btn-primary':'btn-light';
                ?>
                        <li>
                            <a class="btn <?=$btnClass; ?> btn-block btn-menu-left" href="<?=url::to(['article/index','a_type_id' => 3,'a_type_sub_id' => $item->a_type_sub_id])?>" style="white-space:normal;letter-spacing: 0px;line-height: 20px;"><?=$item->a_type_sub_name; ?></a>
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
            <abbr><?=$init['articleTypeSubSelect']->a_type_sub_name; ?>มหาวิทยาลัย</abbr> 
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
                                    <a href="<?=url::to(['article/view','id' => $item->a_id]); ?>">
                                        <img alt="" src="<?=Yii::$app->request->baseUrl.'/upload/article/thumb/'.$item->a_img; ?>">
                                    </a>
                                </div>
                                <div class="post-item-description">
                                    <h2 class="">
                                        <?=HTML::a($item->a_title,[
                                            'article/view','id' => $item->a_id
                                        ]); ?>
                                    </h2>
                                    <p>
                                        <a href="<?=url::to(['article/view','id' => $item->a_id]); ?>">
                                            <?=Yii::$app->mhelpers->subtitle($item->a_detail, 0, 110); ?>
                                        </a>
                                    </p>
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
            <a href="portfolio-infinite-scroll-2-load-article2?<?=$init['a_type_link'];?>&<?=$init['a_type_sub_link'];?>&page=1"></a>
        </div>
        <!-- end:Load next portfolio items -->

        <!-- end: Portfolio -->
    </div>

            </div>
            </div>
</section>
<!-- end: NEWS -->


