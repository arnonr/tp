<?php
    use yii\helpers\Html;
    use yii\helpers\Url;

    $title = 'บุคลากร';

    $upload_path = Yii::$app->request->baseurl.'/upload';
?>
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
<!-- end: Page title -->

<!-- TEAM -->
<section class="section-team">
    <div class="container">
        <div class="row">
            <!-- content -->
            <!-- <div class="content col-md-12"> -->
                <div class="accordion fancy radius">
                    <?php foreach ($model as $key => $item) :
                        $active = '';
                        if($key == 1){
                            $active = ' active ac-active';
                        }
                    ?>
                    <div class="ac-item <?=$active; ?>">
                        <h3 class="ac-title"><i class="fa fa-user"></i><?=$item['name']; ?></h3>
                        <div class="ac-content">
                            <?php  
                                $i = 1;
                                foreach($item['data'] as $data):
                                    $class = 'col-md-3';    
                                    if($data->t_position == 'ผู้อำนวยการ'){ $class = 'col-md-offset-4 col-md-4 text-center'; }
                            ?>
                                
                                <div class="<?=$class; ?> text-center" style="padding-bottom:2em;">
                                    <div class="team-member">
                                        <div class="team-image">
                                            <?=HTML::img($upload_path.'/team/thumb/'.$data->t_img, [
                                                'alt' => $data->t_fname.' '.$data->t_lname,
                                                'title' => $data->t_fname.' '.$data->t_lname,
                                                'style' => 'border: 1px solid #ddd;'
                                            ]); ?>
                                        </div>
                                        
                                        <div class="team-desc">
                                            <h4 style="font-size:18px;margin-top: 1em;font-weight: 500;"><?=$data->t_prefix.' '.$data->t_fname.' '.$data->t_lname; ?></h4>
                                            <span><?=$data->t_position; ?></span><br>
                                            <span><?=$data->t_level; ?></span><br>

                                            <?php if($data->t_level != ''){echo "<br>";} ?>


                                            
                                            <div class="text-center">
                                                <!-- <hr> -->
                                                <a class="btn btn-xs btn-primary" href="tel:02555<?=$data->t_phone; ?>" data-width="80" style="font-size: 14px;;border-radius: 18px;">
                                                    <i class="fa fa-phone"></i>
                                                    <span><?=$data->t_phone; ?></span>
                                                </a>
                                            </div>
                                            <div class="text-center">
                                                <a class="btn btn-xs btn-primary" href="mailto:<?=$data->t_mail; ?>" data-width="250" style="font-size: 12px;text-transform: none;width: 250px;border-radius: 18px;text-shadow: 0px 0px 0px rgba(0, 0, 0, 0.2);">
                                                    <i class="fa fa-envelope"></i>
                                                    <span><?=$data->t_mail; ?></span>
                                                </a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- <hr> -->
                                </div>
                            <?php
                                if(($data->t_position == 'Director') || ($data->t_position == 'Deputy Director for Dual Education and Industrial Relations')){ echo '<div class="clearfix"></div>'; }

                                if($data->t_position == 'ผู้อำนวยการ'){
                                    echo '<div class="clearfix"></div>';
                                }

                                if(($i == 4) && ($key != 1)){ echo '<div class="clearfix"></div>';}
                                    $i++;
                                endforeach;
                            ?>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            <!-- </div> -->
            <!-- end: content -->

        </div>
    </div>
</section>
<!-- end: TEAM -->


