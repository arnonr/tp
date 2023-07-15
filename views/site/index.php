
<?php
    $this->title = 'TGDE';
    $dirAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/polo/dist');
?>
<div class="site-index">
    <?= $this->render(
        'project.php',
        [
            'dirAsset' => $dirAsset,
            'projectLogo' => $init['projectLogo'],
        ]
    ) ?>

    <?= $this->render(
        'slider.php',
        [
            'dirAsset' => $dirAsset,
            'slide' => $init['slide']
        ]
    ) ?>

    <?= $this->render(
        'news.php',
        [
            'dirAsset' => $dirAsset, 
            'news' => $init['news'],
            'newsType' => $init['newsType'],
        ]
    ) ?>

    <!-- NEWS ANNOUCE & Portfolio -->
    <section class="section-news-document" style="margin-bottom:2em;">
        <div class="container">
            <div class="row">
                <div class="col-md-7 div-news-annouce">
                    <?= $this->render(
                        'news-annouce.php',
                        [
                            'dirAsset' => $dirAsset,
                            'newsAnnouce' => $init['newsAnnouce'],
                        ]
                    ) ?>
                </div>
                <div class="col-md-5 div-gallery">
                    <?= $this->render(
                        'portfolio.php',
                        [
                            'dirAsset' => $dirAsset,
                            'tgdePortfolio' => $init['tgdePortfolio']
                            ]
                    ) ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end: NEWS ANNOUCE & Portfolio -->

    
</div>