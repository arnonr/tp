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
                    <?=Html::a($item->an_title,Yii::$app->request->baseUrl.'/upload/document/'.$item->an_url,['target' => '_blank']); ?>
                </td>
                <td class="text-center">
                    <?=($item->an_date) ? Yii::$app->formatter->asDate($item->an_date,'php:d/m/Y') : ''; ?>
                </td>
                <td class="text-center">
                    <a href="<?=Yii::$app->request->baseUrl.'/upload/annouce/'.$item->an_url; ?>" target="_blank">
                        <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-file-pdf-o"></i></button>
                    </a></td>
            </tr>

    <?php  $i++; endforeach; } ?>
    </tbody>
</table>