<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\PortfolioYear;
use app\models\PortfolioProject;
use app\models\PortfolioSubProject;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/polo/dist');
$upload_path = Yii::$app->request->baseurl.'/upload';

$this->title = 'โครงการบูรณาการเขต EEC';
?>

<style>
    a.active{
        color: #fe7300;
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
                    <?=$this->title; ?>
                </li>
            </ul>
        </div>
        <div class="page-title">
            <h1><?=$this->title; ?></h1>
        </div>
    </div>
</section>
<!-- end: Page title -->

<!-- Page Content -->
<section id="page-content">
    <div class="container">
        <div class="row">
            <!-- Sidebar-->
            <div class="sidebar col-md-3">
                <!--Tabs with Posts-->
                <div class="widget">
                    <div id="tabs-01" class="tabs simple">
                        <ul class="tabs-navigation">
                            <li class="active"><a href="#tab1"><?=$this->title; ?></a> </li>
                        </ul>
                        <div class="tabs-content">
                            <div class="tab-pane active" id="tab1">

                                <?php
                                    $class_all = '';
                                    if($port_year_id == null){
                                        $class_all = 'active';
                                    }

                                    echo Html::a('<i class="fa fa-archive"></i> โครงการทั้งหมด',['project/index'],['class' => $class_all]).'<hr />';

                                    foreach ($init['port_year'] as $dt){
                                        $class = '' ;
                                        if($port_year_id == $dt->port_year_id){
                                            $class = 'active';
                                        }
                                        echo Html::a('<i class="fa fa-bar-chart"></i> โครงการ'.$dt->port_year_name,['project/index','port_year_id' => $dt->port_year_id],['class' => $class]).'<hr />';
                                    } 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End: Tabs with Posts-->
            </div>
            <!-- end: sidebar-->

             <!-- content -->
            <div class="content col-md-9">
                
                
                <?php  
                    if($port_year_id == null){
                ?>
                <div>
                    <?php foreach ($init['port_year'] as $dt){ ?>
                    <div>
                        <div class="hr-title hr-long center" style="color:#ddd;">
                            <abbr><?= $dt->port_year_name; ?></abbr> 
                        </div>

                        <div>
                            <ul style="margin-top: 1em;">
                                <?php  
                                    $portfolioProject = PortfolioProject::find()->where([
                                        'active' => 1,
                                        'port_year_id' => $dt->port_year_id
                                    ])->orderBy(['order' => SORT_ASC])->all();

                                    foreach ($portfolioProject as $pp) {
                                        $portfolioSubProject = PortfolioSubProject::find()
                                        ->where(['active' => 1,'port_pro_id'=>$pp->port_pro_id])
                                        ->orderBy(['order' => SORT_ASC])
                                        ->all();

                                        echo '<div style="padding-bottom:0.7em;font-weight:bold;color:#fe7300"><i class="fa fa-circle"></i> '.$pp->port_pro_name.'</div>';

                                        foreach ($portfolioSubProject as $ps) {
                                            echo '<a href="'.url::to(['project/portfolio','port_sub_pro_id' => $ps->port_sub_pro_id]).'"><i class="fa fa-circle" style="margin-left:2em;margin-top:0.7em;"></i> '.$ps->port_sub_pro_name.'</a><br />';
                                        }
                                    }   
                                    ?>
                            </ul>
                        </div>
                     <!--    <div class="seperator">
                            <i class="fa fa-cloud-download"></i>
                        </div> -->
                    </div>
                    <?php } ?>
                </div>
                <?php }else{ 
                    $portYear = PortfolioYear::find()->where(['port_year_id' => $port_year_id])->one();

                    ?>
                    <div>
                        <div class="hr-title hr-long center" style="color:#ddd;">
                            <abbr><?= $portYear->port_year_name; ?></abbr> 
                        </div>

                        <div>
                            <ul style="margin-top: 1em;">
                                <?php  
                                    $portfolioProject = PortfolioProject::find()->where([
                                        'active' => 1,
                                        'port_year_id' => $port_year_id
                                    ])->orderBy(['order' => SORT_ASC])->all();

                                    foreach ($portfolioProject as $pp) {
                                        $portfolioSubProject = PortfolioSubProject::find()
                                        ->where(['active' => 1,'port_pro_id'=>$pp->port_pro_id])
                                        ->orderBy(['order' => SORT_ASC])
                                        ->all();

                                        echo '<div style="padding-bottom:0.7em;color:#fe7300;font-weight:bold;"><i class="fa fa-circle"></i> '.$pp->port_pro_name.'</div>';

                                        foreach ($portfolioSubProject as $ps) {

                                            echo '<a href="'.url::to(['project/portfolio','port_sub_pro_id' => $ps->port_sub_pro_id]).'"><i class="fa fa-circle" style="margin-left:2em;margin-top:0.7em;"></i> '.$ps->port_sub_pro_name.'</a><br />';
                                        }
                                    }   
                                    ?>
                            </ul>
                        </div>
                     <!--    <div class="seperator">
                            <i class="fa fa-cloud-download"></i>
                        </div> -->
                    </div>                       
                        
                <?php } ?>


            </div>
            <!-- end: content -->



        </div>
    </div>
</section>
<!-- end: Page Content -->

