<?php  
use yii\helpers\Url;
?>

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <span class="hide-menu"><?php echo Yii::$app->user->identity->name; ?></span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="<?=url::to(['site/logout']); ?>" data-method="post">
                            <i class="fa fa-power-off"></i> Logout</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-small-cap">-- เมนู</li>
                <?php  
                    if(!Yii::$app->mhelpers->hasRole('global', Yii::$app->user->identity->username)){
                ?>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">หน้าหลัก</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?=url::to(['slide/index'])?>">สไลด์แบนเนอร์</a></li>
                        <li><a href="<?=url::to(['project-logo/index'])?>">โครงการของเรา</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-newspaper-o"></i><span class="hide-menu">ข่าว</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?=url::to(['news/index'])?>">รายการข่าว</a></li>
                        <li><a href="<?=url::to(['annouce/index'])?>">ข่าวประกาศ</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">สหกิจศึกษา</span></a>
                    <ul aria-expanded="false" class="collapse">
                        
                        <li><a href="<?=url::to(['article/update','id' => 2])?>">สหกิจศึกษาคืออะไร ?</a></li>
                        <li><a href="<?=url::to(['article/index','ArticleSearch[a_type_id]' => 1])?>">บทความสหกิจศึกษา</a></li>
                        <li><a href="<?=url::to(['article/update','id' => 9])?>">ปฏิทินสหกิจศีกษา</a></li>
                        <li><a href="<?=url::to(['article/update','id' => 13])?>">ตารางออกสหกิจศีกษา</a></li>
                        <li><a href="<?=url::to(['article/update','id' => 28])?>">เตรียมความพร้อมสหกิจศึกษา</a></li>
                        <li><a href="<?=url::to(['document/index','DocumentSearch[doc_type_main_id]' => 2])?>">เอกสารดาวน์โหลด</a></li>
                    </ul>
                </li>
                        
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">พัฒนาสื่ออิเล็กทรอนิกส์</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?=url::to(['article/index','ArticleSearch[a_type_id]' => 3])?>">งานบริการผลิตสื่อ</a></li>
                        <li><a href="<?=url::to(['article/index','ArticleSearch[a_type_id]' => 7])?>">บทความสื่อ</a></li>
                        <li><a href="<?=url::to(['document/index','DocumentSearch[doc_type_main_id]' => 3])?>">เอกสารดาวน์โหลด</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">บริการของหน่วยงาน</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?=url::to(['article/index','ArticleSearch[a_type_id]' => 4])?>">งานพิมพ์ 3 มิติ</a></li>
                        <li><a href="<?=url::to(['article/index','ArticleSearch[a_type_id]' => 5])?>">เครื่องมือฝึกอบรม</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">ผลงาน</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?=url::to(['tgde-portfolio/index'])?>">ผลงาน</a></li>
                        <!-- <li><a href="<?=url::to(['tgde-portfolio-year/index'])?>">ปีผลงาน</a></li> -->
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">เกี่ยวกับเรา</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?=url::to(['about/update','id' => 1])?>">ความเป็นมา</a></li>
                        <li><a href="<?=url::to(['about/update','id' => 2])?>">วิสัยทัศน์ / พันธกิจ</a></li>
                        <li><a href="<?=url::to(['about/update','id' => 3])?>">โครงสร้างองค์กร</a></li>
                        <li><a href="<?=url::to(['km/index'])?>">การจัดการความรู้</a></li>
                        <li><a href="<?=url::to(['team/index'])?>">บุคลากร</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">สำนักงาน</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?=url::to(['document/index','DocumentSearch[doc_type_main_id]' => 1])?>">เอกสารดาวน์โหลด</a></li>
                    </ul>
                </li>

            
                <li class="nav-small-cap">-- KMUTNB e-Learning Service</li>
                <li> <a class="waves-effect waves-dark" href="<?=url::to(['ed-type/index'])?>" aria-expanded="false"><i class="fa fa-th"></i><span class="hide-menu">จัดการ</span></a></li>


                <li class="nav-small-cap">-- โครงการบูรณาการเขต EEC</li>        
                <li> <a class="waves-effect waves-dark" href="<?=url::to(['portfolio-project/index'])?>" aria-expanded="false"><i class="fa fa-th"></i><span class="hide-menu">จัดการ</span></a></li>

                <li class="nav-small-cap">-- โครงการหุ่นยนต์กรีดยาง</li>      
                <li> <a class="waves-effect waves-dark" href="<?=url::to(['article/update','id' => 27])?>" aria-expanded="false"><i class="fa fa-th"></i><span class="hide-menu">จัดการ</span></a></li>

               <?php } ?>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>