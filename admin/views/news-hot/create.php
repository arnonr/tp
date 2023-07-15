<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NewsHot */

$this->title = 'Create News Hot';
$this->params['breadcrumbs'][] = ['label' => 'News Hots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-hot-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
