<?php
    use yii\helpers\Html;

    $data1 = [
        [
            'doc_title' => 'หลักสูตร การใช้งาน PLC เบื้องต้น',
            'doc_url' => '1_BasicPLC.pdf',
            'doc_time' => '4 วัน'
        ],
        [
            'doc_title' => 'หลักสูตร ระบบควบคุมอัตโนมัติขั้นสูง',
            'doc_url' => '2_Advance PLC.pdf',
            'doc_time' => '4 วัน'
        ],
        [
            'doc_title' => 'การอบรมเชิงปฏิบัติการหลักสูตร Microsoft SQL Server',
            'doc_url' => '3_MS SQL Server.pdf',
            'doc_time' => '5 วัน'
        ],
        [
            'doc_title' => 'การอบรมเชิงปฏิบัติการหลักสูตร Internet of Things',
            'doc_url' => '4_IOT 5Day.pdf',
            'doc_time' => '5 วัน'
        ],
        [
            'doc_title' => 'การอบรมเชิงปฏิบัติการหลักสูตร Internet of Things',
            'doc_url' => '5_IOT 4Day.pdf',
            'doc_time' => '4 วัน'
        ],
        [
            'doc_title' => 'การอบรมเชิงปฏิบัติการหลักสูตร Basic Microcontroller',
            'doc_url' => '6_Arduino 4Day.pdf',
            'doc_time' => '4 วัน'
        ],
        [
            'doc_title' => 'การอบรมเชิงปฏิบัติการหลักสูตร Basic Microcontroller',
            'doc_url' => '7_Arduino 5Day.pdf',
            'doc_time' => '5 วัน'
        ],
        [
            'doc_title' => 'การอบรมเชิงปฏิบัติการหลักสูตร หลักสูตร Robot (KUKA) Basic Operation and Programming',
            'doc_url' => '8_Robot (KUKA).pdf',
            'doc_time' => '5 วัน'
        ],
        [
            'doc_title' => 'การอบรมเชิงปฏิบัติการหลักสูตร หลักสูตร PHP & Mysql',
            'doc_url' => '9_php _ mysql.pdf',
            'doc_time' => '3 วัน'
        ],
        [
            'doc_title' => 'หลักสูตร Basic Rasberry PI',
            'doc_url' => '10_Basic Rasberry PI.pdf',
            'doc_time' => '4 วัน'
        ],
        [
            'doc_title' => 'หลักสูตร การเขียนโปรแกรมเบื้องต้นด้วยภาษา Python',
            'doc_url' => '11_Python.pdf',
            'doc_time' => '4 วัน'
        ],
        [
            'doc_title' => 'หลักสูตร Basic Data Analytics & Programming - Freeware',
            'doc_url' => '12_R-programing.pdf',
            'doc_time' => '3 วัน'
        ],
        [
            'doc_title' => 'หลักสูตร Basic Solid work',
            'doc_url' => '13_Basic SOLIDWORK.pdf',
            'doc_time' => '4 วัน'
        ],
        [
            'doc_title' => 'หลักสูตร Advance Solid work',
            'doc_url' => '14_Advance SOLIDWORK.pdf',
            'doc_time' => '2 วัน'
        ],
        [
            'doc_title' => 'การอบรมเชิงปฏิบัติการ หลักสูตร Image Processing and Machine Vision',
            'doc_url' => '15_Image Processing 3Day.pdf',
            'doc_time' => '3 วัน'
        ],
        [
            'doc_title' => 'การอบรมเชิงปฏิบัติการ หลักสูตร Image Processing and Machine Vision',
            'doc_url' => '16_Image Processing 4Day.pdf',
            'doc_time' => '4 วัน'
        ],
        [
            'doc_title' => 'การอบรมเชิงปฏิบัติการ หลักสูตร Microsoft Azure for Data Analytics',
            'doc_url' => '17_Microsoft Azure.pdf',
            'doc_time' => '3 วัน'
        ],
        [
            'doc_title' => 'หลักสูตร การจัดน้ำและน้ำเสีย',
            'doc_url' => '18_waste.pdf',
            'doc_time' => '1 วัน'
        ],
        [
            'doc_title' => 'การอบรมเชิงปฏิบัติการ หลักสูตร Grafana Dashboard',
            'doc_url' => '19_Grafana Dashboard.pdf',
            'doc_time' => '2 วัน'
        ],
        [
            'doc_title' => 'หลักสูตร Advance Node-Red',
            'doc_url' => '20_Advance Node-Red.pdf',
            'doc_time' => '3 วัน'
        ],
        [
            'doc_title' => 'การอบรมเชิงปฏิบัติการ หลักสูตร NodeJS The Complete Guide',
            'doc_url' => '21_NodeJS The Complete Guide.pdf',
            'doc_time' => '3 วัน'
        ],
        [
            'doc_title' => 'การอบรมเชิงปฏิบัติการ หลักสูตร JavaScript for Interactive Web Application',
            'doc_url' => '22_JavaScript.pdf',
            'doc_time' => '2 วัน'
        ],
        [
            'doc_title' => 'การอบรมเชิงปฏิบัติการ หลักสูตร HTML + CSS',
            'doc_url' => '23_HTML + CSS.pdf',
            'doc_time' => '2 วัน'
        ],
        [
            'doc_title' => 'หลักสูตรการพัฒนาองค์กรไปสู่อุตสาหกรรม 4.0 และการประยุกต์ใช้',
            'doc_url' => '24_4.0.pdf',
            'doc_time' => '1 วัน'
        ]
    ]
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
                    <a href="#">หลักสูตรฝึกอบรม</a> 
                </li>
            </ul>
        </div>
        <div class="page-title">
            <h1>หลักสูตรฝึกอบรม</h1>
            <!-- <span>ddd</span> -->
        </div>
    </div>
</section>
<!-- end: Page title -->

<section id="page-content" class="sidebar-left">
    <div class="container">
        <div class="row">

            <!-- post content -->
            <div class="content col-md-12">
               
                <div class="row" > 
                    <div class="col-md-12 m-t-40">
                        <div class="heading heading-left m-b-5 heading-new">
                            <h4 class="color-primary" >หลักสูตรฝึกอบรม</h4>
                        </div>
                        <!--Table with Borders-->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-news-document">
                                <thead>
                                <tr>
                                    <th style="width:5%" class="text-center">ลำดับ</th>
                                    <th style="width:60%">ชื่อหลักสูตร</th>
                                    <th style="width:20%" class="text-center">ระยะเวลาฝึกอบรม</th>
                                    <th class="text-center">รายละเอียด</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        foreach($data1 as $data):
                                    ?>
                                        
                                    <tr>
                                        <td class="text-center">
                                            <?=$i; ?>
                                        </td>
                                        <td>
                                            <?=Html::a($data['doc_title'],Yii::$app->request->baseUrl.'/upload/training/'.$data['doc_url'],['target' => '_blank']); ?>
                                        </td>
                                        <td class="text-center">
                                            <?=$data['doc_time']; ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?=Yii::$app->request->baseUrl.'/upload/training/'.$data['doc_url']; ?>" target="_blank">
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
             

            </div>
            <!-- end: post content -->
        </div>
    </div>
</section>