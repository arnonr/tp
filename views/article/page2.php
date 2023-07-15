<?php 
use yii\helpers\Html;
use yii\helpers\Url;

        if($model) { 
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
                                <a href="#">
                                    <img alt="" src="<?=Yii::$app->request->baseUrl.'/upload/article/thumb/'.$item->a_img; ?>">
                                    
                                </a>
                            </div>
                            <div class="post-item-description">
                                <h2 >
                                    <?=HTML::a($item->a_title,[
                                        'article/view','id' => $item->a_id
                                    ]); ?>
                                </h2>
                                <p>
                                    <?=Yii::$app->mhelpers->subtitle($item->a_detail, 0, 110); ?>
                                </p>
                                <?=HTML::a("อ่านต่อ <i class='fa fa-arrow-right'></i>",['news/view','id' => $item->a_id],['class' => 'item-link']); ?>
                               
                            </div>
                        </div>
                    </div>
                    <!-- end: Post item-->
                </div>
            </div>
            <!-- end : portfolio item -->

    <?php endforeach; } ?>
