<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
app\theme\eliteadmin\LoginAsset::register($this);
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../favicon.ico">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>

    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(<?=$directoryAsset; ?>/img/bg.jpg);">
        <div class="login-box card">
            <div class="card-body">
               <?=$content; ?>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
    </script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
