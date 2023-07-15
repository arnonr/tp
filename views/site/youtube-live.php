<?php
    use yii\helpers\Html;
	$this->title = 'อบรมการเตรียมความพร้อมการทำข้อสอบออนไลน์ผ่านโปรแกรมช่วยเหลือใน Microsoft Team แก่บุคลากรของมหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ';
	$this->params['breadcrumbs'][] = $this->title;

?>

<!-- <style>
    .container1 {
      position: relative;
      overflow: hidden;
      width: 98%;
      padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) 
      margin-bottom: 2em;
    }
*/
/* Then style the iframe to fit in the container div with full height and width */
.responsive-iframe {
  position: absolute;
  top: 0;
  /*left: 0;*/
  bottom: 0;
  right: 0;
  width: 98%;
  height: 100%;
}
</style> -->

<style>	

	.frameyoutube{
		width:70%; 
		height:720px;
	}

	.framelivechat{
		width:20%; 
		height:720px;
	}

@media only screen and (max-width: 600px) {
 	.frameyoutube{
		width:100%; 
		height: 300px;
	}

	.framelivechat{
		width:100%; 
		height: 500px;
	}
}
</style>


<div class="section" style="background-color: #fff;">
    <!-- <div class="text-center">
        <h2 style="padding-top: 2em; color:#fff;">
            อบรมการเตรียมความพร้อมการทำข้อสอบออนไลน์ผ่านโปรแกรมช่วยเหลือใน Microsoft Team 
            <br>
            แก่บุคลากรของมหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ
        </h2>
    </div> -->
    <div class="container1 text-center" style="padding: 2em;">
    	<!-- <img src="<?=Yii::$app->request->baseUrl; ?>/upload/banner1.jpg" alt="" width="560" height="315"> -->

   <!--  	<iframe width="560" height="315" src="https://www.youtube.com/embed/-1P6N8nX6OM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

   		<iframe class="frameyoutube"  src="https://www.youtube.com/embed/Nl6uLU1A_Dc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin-right: 2em;"></iframe>

    	<iframe class="framelivechat" allowfullscreen="" frameborder="0" width="20%" height="720" src="https://www.youtube.com/live_chat?v=Nl6uLU1A_Dc&embed_domain=www.tgde.kmutnb.ac.th"></iframe><br />


      <div class="p-t-20">
        <h4>คู่มือประกอบการฝึกอบรม : <a href="<?=Yii::$app->request->baseUrl; ?>/upload/Testportal.pdf" target="_blank">ดาวน์โหลด</a></h4>
        
      </div>
      <!-- <iframe class="responsive-iframe" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe> -->
    <!--   <iframe class="responsive-iframe" src="https://www.youtube.com/embed/2cmI4ldY3ek" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
  <!--   <a href="https://add.eventable.com/events/607adfdab2d4ed050ae0c63f/607adfdcad00ca0018845823" class="eventable-link" target="_blank" data-key="607adfdab2d4ed050ae0c63f" data-event="607adfdcad00ca0018845823" data-style="1">Add to Calendar</a>



	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://plugins.eventable.com/eventable.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script', 'eventable-script');</script>
    </div> -->

</div>

<!-- <div class="text-center" style="margin-bottom: 2em;">
    <iframe width="90%" height="768" src="https://www.youtube.com/embed/2cmI4ldY3ek" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div> -->

