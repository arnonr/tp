<?php
    use yii\helpers\Html;
    use yii\helpers\Url;

    $title = 'Microsoft Teams';
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
                    <?= Html::a($title,['article/index','a_type_id' => $model->a_type_id]) ?>
                </li>
            </ul>
        </div>
        <div class="page-title">
            <h1><?=$title; ?></h1>
        </div>
    </div>
</section>
<!-- end: Page title -->

<!-- NEWS -->
<section class="section-article">
    <div class="container">
        <div class="row">
            <!-- content -->
            <div class="content col-md-12">
                <!-- Blog -->
                <div id="blog" class="single-post">
                    <!-- Post single item-->
                    <div class="post-item">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="<?=url::to(['article/view','id' => $model->a_id]); ?>">
                                    <img alt="" src="<?=Yii::$app->request->baseUrl.'/upload/article/'.$model->a_img; ?>">
                                </a>
                            </div>
                            <div class="post-item-description">
                                <h3><?=$title; ?></h3>
                                <div>
                                    <p style="text-indent:2em;text-align:justify;">
                                    ในสภาะการณ์แพร่ระบาดของเชื้อไวรัสโควิด-19 ทำให้การเรียนการสอนในมหาวิทยาลัยรวมทั้งการทำงานของบุคลากรในมหาวิทยาลัยมีการเปลี่ยนแปลงไป ทั้งการจัดการเรียนการสอนออนไลน์ การประชุมออนไลน์ผ่านสื่ออิเล็กทรอนิกส์ต่าง ๆ การจัดเก็บไฟล์และการแก้ไขไฟล์ผ่านระบบ Cloud System อันจำเป็นต้องเกิดการปรับตัวเพื่อสอดคล้องกับสถานการณ์ที่เกิดขึ้นในปัจจุบัน ทางสถาบันสหกิจศึกษาและพัฒนาสื่ออิเล็กทรอนิกส์ไทย-เยอรมันได้จัดทำคู่มือการใช้งานและวิดีโอสอนการใช้งานโปรแกรม Microsoft Teams สำหรับการประชุม การจัดเก็บไฟล์ การแชร์ไฟล์เพื่อการแก้ไขพร้อมกันเป็นหมู่คณะ สำหรับพนักงานมหาวิทยาลัยสายสนับสนุน โดยสามารถนำเอาไปปรับประยุกต์ใช้สำหรับการจดบันทึกวาระการประชุม การจัดเก็บเอกสารระหว่างหน่วยงาน การติดตามงานด้านประกันคุณภาพ เป็นต้น
                                    </p>

                                    <a href="https://www.tgde.kmutnb.ac.th/upload/MSTeams.pdf" target="_blank" class="btn btn-success">คู่มือการใช้งาน</a>  
                                </div>

                                <h3 style="margin-top:2em;">การใช้งานโปรแกรม Microsoft Teams ผ่าน Apps และ Web Browser </h3>

                                <iframe width="560" height="315" src="https://www.youtube.com/embed/jg6YFlZbHZo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                <h3 style="margin-top:2em;">ส่วนประกอบของหน้้าจอ</h3>

                                <iframe width="560" height="315" src="https://www.youtube.com/embed/jg6YFlZbHZo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                <h3 style="margin-top:2em;">การสร้างห้องเรียน</h3>

                                <iframe width="560" height="315" src="https://www.youtube.com/embed/eKkVU1MuLZU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                <h3 style="margin-top:2em;">การเชิญเข้าห้องเรียน</h3>

                                <iframe width="560" height="315" src="https://www.youtube.com/embed/oIRJcxa9klE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                <h3 style="margin-top:2em;">การจัดการภายในห้องเรียน</h3>

                                <iframe width="560" height="315" src="https://www.youtube.com/embed/gO3xoCVreWg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                <h3 style="margin-top:2em;">การสร้างปฏิทิน เพื่อนัดหมายเข้าเรียนออนไลน์</h3>
                                    
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/UWPcqESntMg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                <!-- <h3 style="margin-top:2em;">เครื่องมือการจัดการสอนออนไลน์</h3>
                                    
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/k2eccVXbr8w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                
                                <h3 style="margin-top:2em;">การสร้างการบ้าน</h3>

                                <iframe width="560" height="315" src="https://www.youtube.com/embed/dFbQZKrQSLI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


                                <h3 style="margin-top:2em;">การสร้างเกณฑ์การให้คะแนน Rubic</h3>

                                <iframe width="560" height="315" src="https://www.youtube.com/embed/f8VQRVOWc4U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                <h3 style="margin-top:2em;">การให้คะแนนและการรายงานผลคะแนน</h3>

                                <iframe width="560" height="315" src="https://www.youtube.com/embed/p_ekjPwP3Ds" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                <h3 style="margin-top:2em;">การสร้างแบบทดสอบ และประเภทของแบบทดสอบ</h3>

                                <iframe width="560" height="315" src="https://www.youtube.com/embed/1zQmm97oYls" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                <h3 style="margin-top:2em;">การตรวจให้คะแนน</h3>

                                <iframe width="560" height="315" src="https://www.youtube.com/embed/eb0RQinxULY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                <h3 style="margin-top:2em;">การสรุปคะแนน</h3>

                                <iframe width="560" height="315" src="https://www.youtube.com/embed/CtBxv36kv7c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

                            </div>
                        </div>
                    </div>
                    <!-- end: Post single item-->
                </div>
            </div>
            <!-- end: content -->
        </div>
    </div>
</section>
<!-- end: NEWS -->


