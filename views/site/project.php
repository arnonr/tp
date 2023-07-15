<!-- PROJECT -->
<?php 
use yii\helpers\Url;
?>
<style>
    .hover-item:hover {
	    color: #565656;
    }

    .grid li:before {
        height: 75%;
        top: 15px;
        left: -1px;
        border-left: 2px solid #eee;
    }

    .firstProject:before {
        border-left: 0px solid #eee !important;
    }
    @media only screen and (max-width: 600px) {
        .thirdProject:before {
            border-left: 0px solid #eee !important;
        }
    }

</style>
<section class="section-project" style="background-color:#ffbd86;padding-top:0px;">
    <div class="container">
        <div class="row">
            <ul class="grid grid-4-columns" style="margin-bottom:0px;"> 
                <li class="text-center firstProject" style="padding:10px;">
                    <a href="https://www.tgde.kmutnb.ac.th/trainer/" target="_blank">
                        <img src="/upload/project-logo/1605248352586045140.png" alt="" style="width:50%;margin-bottom:5px;">
                    </a>
                    <span style="color:#000;">โครงการครูฝึกช่างเทคนิคขั้นสูง</span>
                </li>
                <li class="text-center" style="padding:10px;">
                    <a href="https://www.tgde.kmutnb.ac.th/i40kmutnb/" target="_blank">
                        <img src="/upload/project-logo/1605248371697455194.png" alt="" style="width:50%;margin-bottom:5px;">
                    </a>
                    <span style="color:#000;">โครงการอุตสาหกรรม 4.0</span>
                </li>
                <li class="text-center thirdProject" style="padding:10px;" >
                    <a href="<?=url::to(['project/index'])?>">
                        <img src="/upload/project-logo/16062931511502298712.png" alt="" style="width:50%;margin-bottom:5px;">
                    </a>
                    <span style="color:#000;">โครงการบูรณาการเขต EEC</span>
                </li>
                <li class="text-center" style="padding:10px;">
                    <a href="https://www.tgde.kmutnb.ac.th/wil/" target="_blank">
                        <img src="/upload/project-logo/16052483641151459779.png" alt="" style="width:50%;margin-bottom:5px;">
                    </a>
                    <span style="color:#000;">โครงการบัณฑิตพันธุ์ใหม่</span>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- end: PROJECT -->