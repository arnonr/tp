<?php
    use yii\helpers\Html;
?>
<!-- Page title -->
<section id="page-title" class="page-title-classic">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li>
                    <?=Html::a('Home',['site/index']) ?>
                </li>
                <li>
                    <a href="#">เอกสาร (<?=$init['documentMain']; ?>)</a> 
                </li>
            </ul>
        </div>
        <div class="page-title">
            <h1>เอกสาร</h1>
            <span><?=$init['documentMain']; ?></span>
        </div>
    </div>
</section>
<!-- end: Page title -->

<section id="page-content" class="sidebar-left">
    <div class="container">
        <div class="row">

            <!-- Sidebar-->
            <div class="sidebar col-md-3">

                <div>
                    <h4 class="color-primary">ประเภทเอกสาร</h4>

                    <ul class="list-unstyled ul-menu-document">
                        <?php
                            $i = 1;
                            foreach($document as $key => $item):
                                $btnClass = ($i == 1)?'btn-primary':'btn-light';
                        ?>
                                <li>
                                    <a class="btn <?=$btnClass; ?> btn-block btn-menu-left scroll-to" href="#section-<?=$i; ?>" style="white-space:normal;letter-spacing: 0px;line-height: 20px;"><?=$item['name']; ?></a>
                                </li>
                        <?php 
                                $i = $i+1;
                            endforeach; 
                        ?>
                    </ul>
                </div>
            </div>
            <!-- end: Sidebar-->

            <!-- post content -->
            <div class="content col-md-9">
                <?php $num = 2; foreach($document as $key => $item): ?>
                <div class="row" > 
                    <div class="col-md-12 m-t-40">
                        <div class="heading heading-left m-b-5 heading-new">
                            <h4 class="color-primary" ><?=$item['name']; ?></h4>
                        </div>
                        <!--Table with Borders-->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-news-document">
                                <thead>
                                <tr>
                                    <th style="width:5%" class="text-center"></th>
                                    <th style="width:80%"><?=$item['name']; ?></th>
                                    <th class="text-center">ดาวน์โหลด</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        $countData = count($item['data']);
                                        foreach($item['data'] as $data):
                                    ?>
                                        
                                    <tr>
                                        <td class="text-center">
                                            <?=$i; ?>
                                            <?php if($i == $countData){ echo "<span id='section-".$num."'></span>"; }  ?>
                                        </td>
                                        <td>
                                            <?=Html::a($data->doc_title,Yii::$app->request->baseUrl.'/upload/document/'.$data->doc_url,['target' => '_blank']); ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?=Yii::$app->request->baseUrl.'/upload/document/'.$data->doc_url; ?>" target="_blank">
                                                <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-file-pdf-o"></i></button>
                                            </a></td>
                                    </tr>

                                    
                                    <?php $i++; endforeach; ?>
                                </tbody>
                            </table>
                            <hr class="color-primary width-2">
                        </div>
                    </div>
                </div>
                <?php $num++; endforeach; ?>

            </div>
            <!-- end: post content -->
        </div>
    </div>
</section>