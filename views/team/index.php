<?php
    use yii\helpers\Html;
    use yii\helpers\Url;

    $title = 'บุคลากร';

    $upload_path = Yii::$app->request->baseurl.'/upload';
?>

<style>
    #dotsMenu ul li:hover {
        background-color: #ff6600;
    }


    .badge {
        border: solid 2px;
        background-color: #ffffff;
    }
</style>
<!-- Page title -->
<section id="page-title" class="page-title-classic">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li>
                    <?= Html::a('หน้าหลัก',['site/index']) ?>
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

<span id='section-1'></span>
<!-- end: Page title -->

<!-- TEAM -->
<section class="section-team">

    <header>
        <nav id="dotsMenu">
            <ul>
                <li><a href="#section-1"><span>ผู้บริหาร</span></a></li>
                <li><a href="#section-2"><span>สำนักงานผู้อำนวยการ</span></a></li>
                <li><a href="#section-3"><span>ฝ่ายสหกิจศึกษา</span></a></li>
                <li><a href="#section-4"><span>ฝ่ายพัฒนาสื่อและการจัดการเรียนการสอนอิเล็กทรอนิกส์</span></a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="row">
           <!-- Content -->
           
        <section id="page-content" class="sidebar-left">
            <div class="container">
                <div class="row">
            <!-- post content -->
            <div class="content col-md-12">
                
                <?php $j=2; foreach ($model as $key => $item) :  ?>
                    
                    <h4 class="color-primary text-center"><?=$item['name']; ?></h4>
                    <div class="row team-members m-b-40">
                            <?php 
                                $i = 1;
                                $countData = count($item['data']);
                                foreach($item['data'] as $data):
                                    $class = 'col-md-3';    
                                    if($data->t_position == 'รักษาการผู้อำนวยการ<br>'){ $class = 'col-md-12 text-center'; }
                                    if($data->t_position == 'รักษาการแทนรองผู้อำนวยการฝ่ายพัฒนาสื่อและการจัดการเรียนการสอนอิเล็กทรอนิกส์'){ $class = 'col-md-6 text-center'; }
                                    if($data->t_position == 'รักษาการแทนรองผู้อำนวยการฝ่ายฝึกอบรมและบริการวิชาการ'){ $class = 'col-md-6 text-center'; }
                            ?>

                                <div class="<?=$class; ?>">
                                    <div class="team-member">
                                        <div class="team-image">
                                            <?=HTML::img($upload_path.'/team/'.$data->t_img, [
                                                'alt' => $data->t_fname.' '.$data->t_lname,
                                                'title' => $data->t_fname.' '.$data->t_lname,
                                                'style' => 'border: 1px solid #ddd;width:220px;'
                                            ]); ?>
                                        </div>
                                        <div class="team-desc">
                                            <h3>
                                                <?=$data->t_prefix.' '.$data->t_fname.' '.$data->t_lname; ?>
                                            </h3>

                                            <span><?=$data->t_position; ?></span><br>
                                            <?=($data->t_level != "")?'<span>'.$data->t_level.'</span><br />':'';
                                                
                                            ?>
                                            


                                            <span class="badge badge-light"><a href="#"><i class="fa fa-phone"></i> <?=$data->t_phone; ?></span></a><br />





                                            <span class="badge badge-pill badge-primary" style="margin-top:2px;"><a href="#"><i class="fa fa-envelope"></i> <?=$data->t_mail; ?></span></a><br />
                                        </div>
                                        <?php if($i == $countData){ echo "<span id='section-".$j."'></span>"; }  ?>
                                    </div>
                                </div>

                                <?php if($data->t_position == 'ผู้อำนวยการ<br>'){
                                    echo '<div class="clearfix"></div>';
                                }
                                ?>

                            <?php $i++; endforeach; ?>
                    </div>
                    <hr>
                <?php $j++; endforeach; ?>
                
            </div>
                    <!-- end: post content -->
            <!-- <div class="sidebar col-md-3">
                <div>
                    <h4 class="color-primary">บุคลากร</h4>
                    <ul class="list-unstyled ul-menu-document">
                        <li class="active">
                            <a class="btn btn-primary btn-block btn-menu-left scroll-to" href="#section-1" style="white-space:normal;letter-spacing: 0px;line-height: 20px;">ผู้บริหาร</a>
                        </li>
                        <li>
                            <a class="btn btn-block btn-light btn-menu-left scroll-to" href="#section-2" style="white-space:normal;letter-spacing: 0px;line-height: 20px;">สำนักงานผู้อำนวยการ</a>
                        </li>
                        <li>
                            <a class="btn btn-block btn-light btn-menu-left scroll-to" href="#section-3" style="white-space:normal;letter-spacing: 0px;line-height: 20px;">ฝ่ายสหกิจศึกษา</a>
                        </li>
                        <li>
                            <a class="btn btn-block btn-light btn-menu-left scroll-to" href="#section-4" style="white-space:normal;letter-spacing: 0px;line-height: 20px;">ฝ่ายพัฒนาสื่อและการจัดการเรียนการสอนอิเล็กทรอนิกส์</a>
                        </li>
                    </ul>
                </div>
            </div> -->
            <!-- end: Sidebar-->


                   
                </div>
            </div>
        </section> <!-- end: Content -->

        </div>
    </div>
</section>
<!-- end: TEAM -->


