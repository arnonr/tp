<?php 
use yii\helpers\Html;
use yii\helpers\Url;

        if($model) { 
            foreach($model as $item):
?>
            <!-- portfolio item -->
            <div 
                class="tgde-portfolio-item portfolio-item img-zoom">
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
                                <h2 >
                                    <?=HTML::a($item->tp_title,[
                                        'tgde-portfolio/view','id' => $item->tp_id
                                    ]); ?>
                                </h2>
                                <p>
                                    <?=Yii::$app->mhelpers->subtitle($item->tp_detail, 0, 110); ?>
                                </p>
                                <?=HTML::a("อ่านต่อ <i class='fa fa-arrow-right'></i>",['tgde-portfolio/view','id' => $item->tp_id],['class' => 'item-link']); ?>
                               
                            </div>
                        </div>
                    </div>
                    <!-- end: Post item-->
                </div>
            </div>
            <!-- end : portfolio item -->

    <?php endforeach; } ?>
