<?php 
namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\helpers\Html;

class Mdate extends Component
{
	public function datesave($date = null)
	{
		if($date == null){
			$date = null;
		}else{
            $pos = strpos($date, '/');

            if($pos !== false){
               $date = strtotime(str_replace('/', '-', $date)); 
            }
		}
		return $date;
    }
    
    public function datebudsave($date = null)
    {
        if($date == null){
            $date = null;
        }else{
            $date = explode("/",$date);
            $i = 1;
            $res = "";
            foreach ($date as $da) {
                if($i == 3){
                    $res = $res.($da-543);
                }else{
                    $res = $res.$da."/";
                }
                $i++;
            }
            $date = strtotime(str_replace('/', '-', $res));
        }
        return $date;
    }

	public function dateshow($date = null)
	{
		if($date == null){
			$date = null;
		}else{
			$date = date('d/m/Y H:i:s', $date);
		}
		return $date;
	}

    public function dateshownotime($date = null)
    {
        if($date == null){
            $date = null;
        }else{
            $date = date('d/m/Y', $date);
        }
        return $date;
    }

	public function checkanddate($model, $con, $attr_name, $news_host, $news_host_start, $news_host_end)
	{
		$attr = $con.'_'.$attr_name;
		$label = $con.'-'.$attr_name;

		$html = '<label class="control-label col-md-2 col-sm-2 col-xs-12" for="'.$label.'">';
		$html .= $model->getAttributeLabel($attr);
		$html .= '</label>';
        $html .= '<div class="col-md-1 col-sm-1 col-xs-8" style="padding: 5px;">';
        $html .= Html::activeCheckbox($model,$attr,[
        	'class' => 'flat '.$con.'-checkbox-'.$attr_name,
        	'label' => null
        ]);
            
        $html .= '</div>';
        $html .= '<div id="'.$label.'-date" class="col-md-7 col-sm-7 col-xs-12">';
        $html .= '<label class="control-label col-md-1 col-sm-1 col-xs-12" for="'.$label.'-start">';
       	$html .= 'From';
       	$html .= '</label>';
       	$html .= '<div class="col-md-5 col-sm-5 col-xs-12">';

        $html .= Html::activeTextInput($model,$attr_name.'_start',[
        	'maxlength' => true,
            'class' => 'form-control col-md-9 col-xs-12 date',
            'value' => Yii::$app->mdate->dateshow($model->$attr_name.'_start')
        ]);

        $html .= '<span class="fa fa-calendar-o form-control-feedback right" aria-hidden="true"></span>';
        $html .= '</div>';
        // $html .= '<label class="control-label col-md-1 col-sm-1 col-xs-12" for="'.$label.'-end">';
        // $html .= 'To';
        // $html .= '</label>';
        // $html .= '<div class="col-md-5 col-sm-5 col-xs-12">';
        // $html .= $model->news_host_end = Yii::$app->mdate->dateshow($model->news_host_end);
        //             echo $form->field($model, 'news_host_end')->textInput([
        //                 'maxlength' => true,
        //                 'class' => 'form-control col-md-9 col-xs-12 date',
        //             ])->label(false);
        // $html .= '<span class="fa fa-calendar-o form-control-feedback right" aria-hidden="true"></span>';
        // $html .= '</div>';
        $html .= '</div>';

        $html .= '<script>$(document).ready(function(){$("#host_start").datetimepicker({format: "DD/MM/YYYY",defaultDate: moment()});});<script>';


// 
        // $('#host_start').datetimepicker({
        //     format: "DD/MM/YYYY",
        //     defaultDate: moment(),
        // });
        //  //ตั้งค่าการเลือกวันที่ให้ไม่สามารถเลือกย้อนหลังได้
        // $('#host_end').datetimepicker({
        //     useCurrent: false, //Important! See issue #1075
        //     format: "DD/MM/YYYY",
        // });
        // $("#host_start").on("dp.change", function (e) {
        //     $('#host_end').data("DateTimePicker").minDate(e.date);
        // });

        // $("#host_end").on("dp.change", function (e) {
        //     $('#host_start').data("DateTimePicker").maxDate(e.date);
        // });

        // $("#host_end").on("dp.change", function (e) {
        //     $('#pin_start').data("DateTimePicker").maxDate(e.date);
        // });

        // // กรณีแก้ไข ให้ตรวจสอบว่าได้เลือกแสดงข้อมูลตามวันที่หรือเปล่า
        // if($("chk-host").is(':checked'))
        //     $('#news-host-date').show(100);  // checked

        
        // $("#pin_start").datetimepicker({
        //     format: "DD/MM/YYYY",
        //     defaultDate: moment(),
        // });

        // //เมื่อคลิกเลือกข่าว host
        // $('.chk-host').on('ifToggled', function(event) {
        //     $('#news-host-date').toggle(100);
        // });

// 
        return $html;
	}

    public function thai_date($time){ 
     
        $thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");  
        $thai_month_arr=array(  
            "0"=>"",  
            "1"=>"มกราคม",  
            "01"=>"มกราคม",  
            "2"=>"กุมภาพันธ์",  
            "02"=>"กุมภาพันธ์",  
            "3"=>"มีนาคม",  
            "03"=>"มีนาคม",  
            "4"=>"เมษายน",
            "04"=>"เมษายน",  
            "5"=>"พฤษภาคม",
            "05"=>"พฤษภาคม",  
            "6"=>"มิถุนายน",
            "06"=>"มิถุนายน",   
            "7"=>"กรกฎาคม",
            "07"=>"กรกฎาคม",  
            "8"=>"สิงหาคม",
            "08"=>"สิงหาคม",  
            "9"=>"กันยายน",
            "09"=>"กันยายน",  
            "10"=>"ตุลาคม",  
            "11"=>"พฤศจิกายน",  
            "12"=>"ธันวาคม"                    
        ); 
        //global $thai_day_arr,$thai_month_arr;  
        //$thai_date_return="วัน".$thai_day_arr[date("w",$time)];  
        //$thai_date_return.= "ที่ ".date("j",$time);  
        
        $thai_date_return=$thai_month_arr[$time];  
        //$thai_date_return.= " พ.ศ.".(date("Yํ",$time)+543);  
        //$thai_date_return.= "  ".date("H:i",$time)." น.";  
        return $thai_date_return;  
    }  
    public function thai_day($time){  
        $thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");  
        $thai_month_arr=array(  
            "0"=>"",  
            "1"=>"มกราคม",  
            "2"=>"กุมภาพันธ์",  
            "3"=>"มีนาคม",  
            "4"=>"เมษายน",  
            "5"=>"พฤษภาคม",  
            "6"=>"มิถุนายน",   
            "7"=>"กรกฎาคม",  
            "8"=>"สิงหาคม",  
            "9"=>"กันยายน",  
            "10"=>"ตุลาคม",  
            "11"=>"พฤศจิกายน",  
            "12"=>"ธันวาคม"                    
        ); 
        //global $thai_day_arr,$thai_month_arr;  
        //$thai_date_return="วัน".$thai_day_arr[date("w",$time)];  
        $thai_date_return = date("j",$time);  
        //$thai_date_return=$thai_month_arr[$time];  
        //$thai_date_return.= " พ.ศ.".(date("Yํ",$time)+543);  
        //$thai_date_return.= "  ".date("H:i",$time)." น.";  
        return $thai_date_return;  
    }  

    public function datethaishow($date = null, $short = null)
    {
        if($date == null){
            $thai_date = null;
        }else{

            $thai_day_arr = array(  
                "0"=>"0",  
                "01"=>"1",  
                "02"=>"2",  
                "03"=>"3",  
                "04"=>"4",  
                "05"=>"5",  
                "06"=>"6",   
                "07"=>"7",  
                "08"=>"8",  
                "09"=>"9",  
                "10"=>"10",  
                "11"=>"11",  
                "12"=>"12",  
                "13"=>"13",
                "14"=>"14",
                "15"=>"15",
                "16"=>"16",
                "17"=>"17",
                "18"=>"18",
                "19"=>"19",
                "20"=>"20",
                "21"=>"21",
                "22"=>"22",
                "23"=>"23",
                "24"=>"24",
                "25"=>"25",
                "26"=>"26",
                "27"=>"27",
                "28"=>"28",
                "29"=>"29",
                "30"=>"30",
                "31"=>"31",

            );

            $thai_month_arr = array(  
                "0"=>"",  
                "01"=>"มกราคม",  
                "02"=>"กุมภาพันธ์",  
                "03"=>"มีนาคม",  
                "04"=>"เมษายน",  
                "05"=>"พฤษภาคม",  
                "06"=>"มิถุนายน",   
                "07"=>"กรกฎาคม",  
                "08"=>"สิงหาคม",  
                "09"=>"กันยายน",  
                "10"=>"ตุลาคม",  
                "11"=>"พฤศจิกายน",  
                "12"=>"ธันวาคม"                    
            );

            if($short == 'short'){
                $thai_month_arr = array(  
                    "0"=>"",  
                    "01"=>"ม.ค.",  
                    "02"=>"ก.พ.",  
                    "03"=>"มี.ค.",  
                    "04"=>"เม.ย.",  
                    "05"=>"พ.ค.",  
                    "06"=>"มิ.ย.",   
                    "07"=>"ก.ค.",  
                    "08"=>"ส.ค.",  
                    "09"=>"ก.ย.",  
                    "10"=>"ต.ค.",  
                    "11"=>"พ.ย.",  
                    "12"=>"ธ.ค."                    
                );
            }

            $date = Yii::$app->Formatter->asDate($date,'php:d/m/Y');
            $date = explode('/', $date);

            $day = $thai_day_arr[$date[0]];
            $month = $thai_month_arr[$date[1]]; 
            $year = $date[2]+543;

            $thai_date = $day.' '.$month.' '.$year;
        }
        return  $thai_date;
    }

}