<?php
    use yii\helpers\Html;
    use yii\helpers\Url;

    $title = 'องค์กรแห่งการเรียนรู้'; 
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

<!-- KM -->
<section class="section-km">
    <div class="container">
       
        <!--Table with Borders-->
        <table class="table table-bordered table-striped table-news-document">
            <thead>
                <tr>
                    <th style="width:5%" class="text-center">#</th>
                    <th style="width:60%">หัวข้อความรู้</th>
                    <th class="text-center" style="width:15%">ผู้เขียน</th>
                    <th class="text-center" style="width:10%">ผู้เข้าชม</th>
                    <th class="text-center" style="width:10%">ดาวน์โหลด</th>
                </tr>
            </thead>
            <tbody class="table-feed">
                <?php
                    if($model) { 
                        $i = 1;
                        foreach($model as $item):

                        	if($item->km_url == ''){
                        		$link = $item->km_link;
                        		$icon ='fa-play';

                        	}else{
                        		$link = Yii::$app->request->baseUrl.'/upload/km/'.$item->km_url;
                        		$icon ='fa-file-pdf-o';
                        	}
                ?>
                        <tr class="table-row">
                            <td class="text-center"><?=$i; ?></td>
                            <td>
                                <?=Html::a($item->km_title, $link,['target' => '_blank']); ?>
                            </td>
                            <td class="text-center">
                               <?=$item->km_writer; ?>
                            </td>
                            <td class="text-center">
                                <?=$item->views; ?>
                            </td>
                            <td class="text-center">
                                <a href="<?=$link; ?>" target="_blank">
                                    <button type="button" class="btn btn-primary btn-xs"><i class="fa <?=$icon; ?>"></i></button>
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
<!-- end: KM -->

<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>

<script>
$(document).ready(function() {
    // init Infinite Scroll
    $('.table-feed').infiniteScroll({
        path: 'index?page={{#}}',
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