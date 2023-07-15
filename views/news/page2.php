<?php 
use yii\helpers\Html;
use yii\helpers\Url;

        if($model) { 
            foreach($model as $item):
?>
            <!-- portfolio item -->
            <div 
                class="news-item portfolio-item img-zoom news-<?=$item->newsType->tag ?>">
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
                                <h2 >
                                    <?=HTML::a(Yii::$app->mhelpers->subtitle1($item->n_title,0, 105),[
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

    <?php endforeach; } ?>
