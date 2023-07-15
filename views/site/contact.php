<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    $dirAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/polo/dist');

    $title = 'ติดต่อเรา'; 
?>
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

<section class="content p-t-50 p-b-0" style="background-color: #fff;">
    <div class="container">
        <div class="row">
            <!-- Blog post-->
            <div class="post-content post-thumbnail col-md-12">
                

                <div class="col-md-12" style="margin-bottom: 2em;">
                    <h3 class="color-primary">
                        สถาบันสหกิจศึกษาและพัฒนาสื่ออิเล็กทรอนิกส์ ไทย-เยอรมัน
                    </h3>
                    
                    <div class="col-md-6">
                       <!--  <a href="<?=$dirAsset?>/img/Map1.jpg" target="_blank">
                            <img src="<?=$dirAsset?>/img/Map1.jpg" style="width:100%">
                        </a> -->
                        
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1937.14336622365!2d100.51236718338474!3d13.82181335218567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29b9c724484f9%3A0x8ef839b94bc87984!2z4Liq4LiW4Liy4Lia4Lix4LiZ4Liq4Lir4LiB4Li04LiI4Lio4Li24LiB4Lip4Liy4LmB4Lil4Liw4Lie4Lix4LiS4LiZ4Liy4Liq4Li34LmI4Lit4Lit4Li04LmA4Lil4LmH4LiB4LiX4Lij4Lit4LiZ4Li04LiB4Liq4LmMIOC5hOC4l-C4oi3guYDguKLguK3guKPguKHguLHguJkgKOC4reC4suC4hOC4suC4oyA3Myk!5e0!3m2!1sen!2sth!4v1606292111331!5m2!1sen!2sth" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                      
                    </div>
                    <div class="col-md-6">
                        <address>
                            <h4 class="color-primary">ที่ตั้ง</h4>
                            <span style="font-weight: bold;">
                                อาคาร 73 สถาบันสหกิจศึกษาและพัฒนาสื่ออิเล็กทรอนิกส์ ไทย-เยอรมัน<br>
                                มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ<br>
                                1518 ถนนประชาราษฏร์ 1 แขวงวงศ์สว่าง เขตบางซื่อ กทม. 10800<br>
                            </span>

                            <br><br>
                            <h4 class="color-primary">ติดต่อ</h4>
                            <span style="font-weight: bold;">
                            Tel : <a href="tel::admin@tgde.kmutnb.ac.th" target="_blank">02-555-2273</a>
                            <br>
                            
                            อีเมล : <a href="mailto::admin@tgde.kmutnb.ac.th" target="_blank">admin@tgde.kmutnb.ac.th</a>
                            <br>
                                
                            จันทร์-ศุกร์ : 8.00 - 16.00
                            <br>

                            Facebook : <a href="https://www.facebook.com/KMUTNB.TGDE/" target="_blank">TGDE KMUTNB</a>
                            <br>

                            Youtube : <a href="https://www.youtube.com/channel/UCeixFUwykocOrXATDivCFfA" target="_blank">TGDE Channel</a>
                            <br>
                            </span>
                            <br>
                            <a href="<?=$dirAsset?>/img/Map1.jpg" class="btn btn-primary" target="_blank">แผนที่</a>
                          <!--   <br>
                            <a href="#" class="btn btn-primary">ดูแผนที่จอดรถ</a> -->
                        </address>
                    </div>
                    <hr class="color-primary width-2" style="margin-top: 1em;">
                    
                </div>

                <div class="col-md-12" >
                    <h3 class="color-primary">
                        ห้องฝึกอบรม (คณะพัฒนาธุรกิจและอุตสาหกรรม)
                    </h3>
                    
                    <div class="col-md-6">
                        <!-- <a href="<?=$dirAsset?>/img/Map2.jpg" target="_blank">
                            <img src="<?=$dirAsset?>/img/Map2.jpg" style="width:100%">
                        </a> -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3874.2532390721003!2d100.50971135065429!3d13.82382649929652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29b9e8f6f33b9%3A0xdcd2c4e5ec977c08!2z4LiE4LiT4Liw4Lie4Lix4LiS4LiZ4Liy4LiY4Li44Lij4LiB4Li04LiI4LmB4Lil4Liw4Lit4Li44LiV4Liq4Liy4Lir4LiB4Lij4Lij4LihIOC4oeC4iOC4ni4!5e0!3m2!1sen!2sth!4v1607932740957!5m2!1sen!2sth" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>ช
                    </div>
                    <div class="col-md-6">
                        <address>
                            <h4 class="color-primary">ที่ตั้ง</h4>
                            <span style="font-weight: bold;">
                                อาคาร 96 คณะพัฒนาธุรกิจและอุตสาหกรรม (ชั้น 1 และ 10)<br>
                                มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ<br>
                                1518 ถนนประชาราษฏร์ 1 แขวงวงศ์สว่าง เขตบางซื่อ กทม. 10800<br>
                                <br>
                            </span>
                            <br>
                            <a href="<?=$dirAsset?>/img/Map2.jpg" class="btn btn-primary" target="_blank">แผนที่</a>
                            <!-- <a href="#" class="btn btn-primary">ดูแผนที่</a> -->
                        </address>
                    </div>
                    <hr class="color-primary width-2">
                    
                </div>

            </div>
            <!-- END: Blog post-->
        </div>
    </div>
</section>