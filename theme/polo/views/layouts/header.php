<?php  
    use yii\helpers\Url;
?>

<style type="text/css">
    @media only screen and (max-width: 800px) {
        #mainMenu nav > ul > li > a {
            font-size: 14px;
        }
    }
</style>

<!-- Topbar -->
<div id="topbar" class="topbar-fullwidth dark">
    <div class="container">
        <div class="row">
            <div class="col-md-10 hidden-xs">
            </div>
            <div class="col-md-2 text-right">
                <ul class="top-menu">
                    <li><a href="<?=url::to(['office/index'])?>"><i class="fa fa-user"></i> สำนักงาน</a></li>
                    <li><a href="https://www.tgde.kmutnb.ac.th" style="margin-right: 0px !important;">TH |</a> </li>
                    <li><a href="https://www.tgde.kmutnb.ac.th/en">EN</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end: Topbar -->

<!-- Header -->
<header id="header" class="header-fullwidth dark"  style="line-height: 110px;">
    <div id="header-wrap">
        <div class="container">
            <!--Logo-->
            <div id="logo">
                <a href="<?=url::to(['site/index']); ?>" class="logo" data-dark-logo="<?=$dirAsset; ?>/img/logo-tgde.png">
                    <img src="<?=$dirAsset; ?>/img/logo-tgde.png" alt="Polo Logo">
                </a>
            </div>
            <!--End: Logo-->

            <!--Language Header Extras-->
            <!-- <div class="header-extras">
                <ul>

                    <li>
                        <div class="topbar">
                            <a class="title" href="#" title="Thai"><img src="<?=$dirAsset; ?>/img/th-flag.png"
                                    alt=""></a>
                        </div>
                    </li>
                    <li class="m-l-5" style="color:#fff;">
                        <div class="topbar">
                            |
                        </div>
                    </li>
                    <li class="m-l-5">
                        <div class="topbar">
                            <a class="title" href="#" title="English"><img src="<?=$dirAsset; ?>/img/us-flag.png"
                                    alt=""></a>
                        </div>
                    </li>
                </ul>
            </div> -->
            <!--end: Language Header Extras-->

            <!--Navigation Resposnive Trigger-->
            <div id="mainMenu-trigger">
                <button class="lines-button x"> <span class="lines"></span> </button>
            </div>
            <!--end: Navigation Resposnive Trigger-->

            <!--Navigation-->
            <div id="mainMenu" class="dark">
                <div class="container">
                    <nav>
                        <ul>
                            <li><a href="<?=url::to(['site/index'])?>">หน้าหลัก</a></li>
                            <li class="dropdown"> <a href="#">สหกิจศึกษา</a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=url::to(['article/view','id' => 2])?>"><i class="fa fa-calendar"></i>สหกิจศึกษาคือ</a></li>
                                    <li><a href="<?=url::to(['article/index','a_type_id' => 1])?>"><i class="fa fa-th"></i>บทความสหกิจศึกษา</a></li>
                                    <li><a href="<?=url::to(['article/view','id' => 13])?>"><i class="fa fa-calendar"></i>ปฏิทินสหกิจศึกษา</a></li>
                                    <li><a href="<?=url::to(['article/view','id' => 28])?>"><i class="fa fa-book"></i>การเตรียมความพร้อม</a></li>


                                    <li><a href="https://cwiekmutnb.com/" target="_blank"><i class="fa fa-database"></i>ระบบฐานข้อมูลสหกิจศึกษา</a></li>
                                    <li><a href="http://coop-lms.codeunbug.com/"><i class="fa fa-book"></i>ระบบเรียนออนไลน์เตรียมความพร้อม</a></li>
                                    <li><a href="https://cwiekmutnb.com/position/added"><i class="fa fa-book"></i>แบบฟอร์มเสนอตำแหน่งงาน</a></li>
                                    <li><a href="<?=url::to(['document/index','doc_type_main_id' => 2])?>"><i class="fa fa-file-o"></i>เอกสารดาวน์โหลด</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"> <a href="#">พัฒนาสื่อ</a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=url::to(['article/index','a_type_id' => 3])?>"><i class="fa fa fa-list"></i>งานบริการผลิตสื่อ</a>
                                    </li>
                                  <!--   <li><a href="<?=url::to(['article/index','a_type_id' => 7])?>"><i class="fa fa fa-book"></i>Articles</a>
                                    </li> -->
                                    <li><a href="<?=url::to(['document/index','doc_type_main_id' => 3])?>"><i class="fa fa-file-o"></i>เอกสารดาวน์โหลด</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"> <a href="#">งานบริการวิชาการ</a>
                                <ul class="dropdown-menu">
                                    <li><a href="https://www.tgde.kmutnb.ac.th/trainer/" target="_blank"><i class="fa fa fa-list"></i>โครงการครูฝึกช่างเทคนิคขั้นสูง</a>
                                    </li>
                                    <!-- <li><a href="https://www.tgde.kmutnb.ac.th/wil/" target="_blank"><i class="fa fa fa-list"></i>WiL KMUTNB</a></li> -->
                                    <!-- <li><a href="<?=url::to(['article/index','a_type_id' => 5])?>"><i class="fa fa fa-gears"></i>Training Tools</a></li> -->
                                </ul>
                            </li>
                            <!-- <li><a href="<?=url::to(['tgde-portfolio/index'])?>">Activities</a></li> -->
                            <li class="dropdown"> <a href="#">เกี่ยวกับเรา</a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=url::to(['about/index','id' => 1])?>"><i class="fa fa-info-circle"></i>ความเป็นมา</a></li>
                                    <li><a href="<?=url::to(['about/index','id' => 2])?>"><i class="fa fa-info-circle"></i>ปรัชญา/ปณิธาน/วิสัยทัศน์</a></li>
                                    <li><a href="<?=url::to(['about/index','id' => 3])?>"><i class="fa fa-sitemap"></i>โครงสร้างองค์กร</a></li>
                                    <li><a href="<?=url::to(['km/index'])?>"><i class="fa fa-book"></i>คลังความรู้ (KM)</a></li>
                                    <li><a href="<?=url::to(['team/index'])?>"><i class="fa fa-users"></i>บุคลากร</a></li>
                                </ul>
                            </li>
                            <li><a href="<?=url::to(['site/contact'])?>">ติดต่อเรา</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!--end: Navigation-->
        </div>
    </div>
</header>
<!-- end: Header -->