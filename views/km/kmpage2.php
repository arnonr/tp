<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>
<table class="table table-bordered table-striped table-news-document">
    <tbody class="table-feed">
<?php
        if($model) { 
            $i = $init['i'];
            foreach($model as $item):
?>
            <tr class="table-row">
                <td class="text-center"><?=$i; ?></td>
                <td>
                    <?=Html::a($item->km_title,Yii::$app->request->baseUrl.'/upload/km/'.$item->km_url,['target' => '_blank']); ?>
                </td>
                <td class="text-center">
                    <?=$item->km_writer; ?>
                </td>
                <td class="text-center">
                    <?=$item->views; ?>
                </td>
                <td class="text-center">
                    <a href="<?=Yii::$app->request->baseUrl.'/upload/km/'.$item->km_url; ?>" target="_blank">
                        <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-file-pdf-o"></i></button>
                    </a></td>
            </tr>

    <?php  $i++; endforeach; } ?>
    </tbody>
</table>