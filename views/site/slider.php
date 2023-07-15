<!-- Slider -->
<div class="home-slider carousel owl-carousel carousel-loaded owl-carousel owl-theme owl-loaded dots-inside arrows-large arrows-creative dots-creative"
    data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut"
    data-autoplay-timeout="2600">
    <?php
        foreach($slide as $item):
    ?>
        <a href="<?=$item->slide_link; ?>" target="<?=$item->slide_target_link; ?>">
            <img src="<?=Yii::$app->request->baseUrl.'/upload/slide/'.$item->slide_url; ?>" alt="" style="width:100%;">
        </a>
    <?php 
        endforeach; 
    ?>

</div>