<?php

namespace app\components;
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use backend\models\Profile;

class Mhelpers extends Component
{
	// public function status($status,$job_start,$job_end,$job_count) {
	//     if($status == 1){
	//       	if($job_end < strtotime(date('Y-m-d'))){
	//           	$text = "<small class='label bg-red'>หมดเวลารับสมัคร</small>";
	//       	}else  if($job_start > strtotime(date('Y-m-d'))){
	//           	$text = "<small class='label bg-red'>ยังไม่ถึงเวลารับสมัคร</small>";
	//       	}else{
	//         	$text = "<small class='label bg-green'>อยู่ระหว่างรับสมัคร</small>";
	//       	}
	//     }else{
	//       	$text = "<small class='label bg-blue'>ปิดรับสมัคร</small>";
	//     }

	//     return $text;
	// }
	  
	public function hasRole($roleName, $userId) {
		$authManager = \Yii::$app->getAuthManager();
		return $authManager->getAssignment($roleName, $userId) ? true : false;
	}
  
}