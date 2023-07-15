<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->doc_id;
$this->params['breadcrumbs'][] = ['label' => 'เอกสารดาวน์โหลด', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="document-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->doc_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->doc_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'doc_id',
            'doc_title',
            'doc_type_id',
            'doc_url:url',
            'create',
            'update',
            'createby',
            'updateby',
            'active',
            'publish',
            'views',
        ],
    ]) ?>

</div>
