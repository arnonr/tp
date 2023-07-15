<?php
    use yii\helpers\Html;
    app\theme\polo\PoloAsset::register($this);
    $dirAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/polo/dist');
?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="TGDE">
        <meta name="description" content="TGDE Website">

        <!-- Meta Facebook -->
        <meta property="og:url"  content="<?=Yii::$app->request->url; ?>" />
        <meta property="og:type"  content="article" />
        <meta property="og:title" content="<?=$this->title; ?>" />
        <meta property="og:description"   content="" />
        <meta property="og:image"         content="https://www.tgde.kmutnb.ac.th/assets/c9c3f9be/img/logo-tgde.png" />

        <link rel="icon" href="../favicon.ico">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>


    </head>
    <body data-icon-color="#ff6600">
    <?php $this->beginBody() ?>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v9.0&appId=205811777462528&autoLogAppEvents=1" nonce="i2S8dLIS"></script>

    <!-- Wrapper -->
    <div id="wrapper">
        <?= $this->render(
            'header.php',
            ['dirAsset' => $dirAsset]
        ) ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 
            'dirAsset' => $dirAsset]
        ) ?>
        
        <?= $this->render(
            'footer.php',
            ['dirAsset' => $dirAsset]
        ) ?>
    </div>
    <!-- end: Wrapper -->

    <!-- Go to top button -->
    <a id="goToTop"><i class="fa fa-angle-up top-icon"></i><i class="fa fa-angle-up"></i></a>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>