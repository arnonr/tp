<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NewsHot */

$this->title = 'Update News Hot: ' . $model->nh_id;
$this->params['breadcrumbs'][] = ['label' => 'News Hots', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nh_id, 'url' => ['view', 'id' => $model->nh_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="news-hot-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
