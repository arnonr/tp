<?php
    use yii\helpers\Url;
?>
<div class="hr-title hr-long center"><abbr>ผลงาน</abbr> </div>
    <div id="portfolio" class="grid-layout portfolio-2-columns" data-margin="20">
        <?php foreach($tgdePortfolio as $item): ?>
        <!-- portfolio item -->
        <div class="portfolio-item light-bg no-overlay">
            <div class="portfolio-item-wrap">
                <div class="portfolio-slider">
                    <!-- <div class="carousel dots-inside dots-dark arrows-dark" data-items="1" data-loop="true"
                        data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut"
                        data-autoplay-timeout="1500"> -->
                        <a href="<?=url::to(['tgde-portfolio/view','id' => $item->tp_id]); ?>"><img src="<?=Yii::$app->request->baseUrl.'/upload/tgde-portfolio/thumb/'.$item->tp_img; ?>"
                                alt=""></a>
                        <!-- <a href="#"><img src="<?=Yii::$app->request->baseUrl.'/upload/tgde-portfolio/thumb/'.$item->tp_img; ?>" -->
                                <!-- alt=""></a>     -->
                    <!-- </div> -->
                </div>
                <div class="portfolio-description">
                    <a href="<?=url::to(['tgde-portfolio/view','id' => $item->tp_id]); ?>">
                        <h3><?=$item->tp_title; ?></h3>
                    </a>
                </div>
            </div>
        </div>

        <?php
            endforeach;
        ?>

        
    </div>
    <div class="text-right"><a href="<?=url::to(['tgde-portfolio/index']); ?>"><button type="button" class="btn btn-rounded btn-outline">ผลงานทั้งหมด <i
                class="fa fa-arrow-right"></i></button></a></div>