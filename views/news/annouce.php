<?php
    use yii\helpers\Html;
    use yii\helpers\Url;

    $title = 'ข่าวประกาศ'; 
?>

<style>
    .div-table {
        display: table;         
        width: auto;         
        background-color: #eee;         
        border: 1px solid #666666;         
        border-spacing: 5px; /* cellspacing:poor IE support for  this */
    }
    .div-table-row {
        display: table-row;
        width: auto;
        clear: both;
    }
    .div-table-col {
        float: left; /* fix for  buggy browsers */
        display: table-column;         
        width: 200px;         
        background-color: #ccc;  
    }
</style>

<!-- Page title -->
<section id="page-title" class="page-title-classic">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li>
                    <?=Html::a('หน้าหลัก',['site/index']) ?>
                </li>
                <li>
                    <?=$title; ?>
                </li>
            </ul>
        </div>
        <div class="page-title">
            <h1><?=$title; ?></h1>
        </div>
    </div>
</section>
<!-- end: Page title -->

<!-- NEWS ANNOUCE-->
<section class="section-news-annouce">
    <div class="container">
       
        <!--Table with Borders-->
        <table class="table table-bordered table-striped table-news-document">
            <thead>
                <tr>
                    <th style="width:5%" class="text-center"></th>
                    <th style="width:70%"><?=$title; ?></th>
                    <th style="width:10%" class="text-center">วันที่ประกาศ</th>
                    <th class="text-center">ดาวน์โหลด</th>
                </tr>
            </thead>
            <tbody class="table-feed">
                <?php
                    if($model) { 
                        $i = 1;
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

                <?php $i++; endforeach; } ?>
            </tbody>
        </table>

        <!-- status elements -->
        <div class="scroller-status text-center">
            <p class="infinite-scroll-request">Loading...</p>
        </div>

        <p class="pagination">
             <a class="pagination__next" href="annouce?page=2">Load Data</a>
        </p>

        <hr class="color-primary width-2">
                            

    </div>
</section>
<!-- end: NEWS ANNOUCE-->

<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>

<script>
$(document).ready(function() {
    // init Infinite Scroll
    $('.table-feed').infiniteScroll({
        path: 'annouce?page={{#}}',
        loadOnScroll: true,
        responseType: 'document',
        button: '.pagination__next',
        append: '.table-row',
        status: '.scroller-status',
        hideNav: '.pagination',
        history: false,
    }); 
})
</script>