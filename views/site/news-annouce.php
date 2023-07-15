<?php
    use yii\helpers\Html;
?>

<div class="hr-title hr-long center"><abbr>ข่าวประกาศ</abbr> </div>
<div class="">
    <table class="table table-bordered table-striped table-news-document">
        <thead>
            <tr>
                <th style="width:5%" class="text-center">#</th>
                <th style="width:70%">หัวข้อ</th>
                <th style="width:10%" class="text-center">วันที่</th>
                <th class="text-center">ดาวน์โหลด</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($newsAnnouce as $item): ?>
            <tr>
                <td class="text-center"><?=$i; ?></td>
                <td><a href="<?=Yii::$app->request->baseUrl.'/upload/annouce/'.$item->an_url; ?>"
                        target="_blank"><?=$item->an_title; ?></a>
                </td>
                <td><?=($item->an_date) ? Yii::$app->formatter->asDate($item->an_date,'php:d/m/Y') : ''; ?>
                </td>
                <td class="text-center">
                    <a href="<?=Yii::$app->request->baseUrl.'/upload/annouce/'.$item->an_url; ?>" target="_blank">
                        <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-file-pdf-o"></i></button>
                    </a>
                </td>
            </tr>
            <?php
                $i++;
                endforeach;
            ?>
        </tbody>
    </table>
</div>
<div class="text-right">
    <?=html::a('<button type="button" class="btn btn-rounded btn-outline">ข่าวประกาศทั้งหมด <i
                class="fa fa-arrow-right"></i></button>',['news/annouce']); ?>
</div>