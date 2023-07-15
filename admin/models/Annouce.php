<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;

class Annouce extends \yii\db\ActiveRecord
{
    public $an_url_old;
    public static function tableName()
    {
        return 'news_annouce';
    }

    public function behaviors()
    {
       return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create',
                'updatedAtAttribute' => 'update',
                'value' => strtotime(date('Y-m-d H:i:s')),
            ], 
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'createby',
                'updatedByAttribute' => 'updateby',
            ],
       ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)){
            if($insert){
                $this->an_date = Yii::$app->mdate->datesave($this->an_date);
           	}else{
           		$this->an_date = Yii::$app->mdate->datesave($this->an_date);
           	}
        }
        return true;
    }

    public function rules()
    {
        return [
            [['an_title'], 'required'],
            [['create', 'update', 'createby', 'updateby', 'active', 'publish', 'views'], 'integer'],
            [['an_title', 'an_url'], 'string', 'max' => 255],
            [['an_date'], 'safe'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'an_id' => 'ข่าวประกาศ',
            'an_title' => 'ข่าวประกาศ',
            'an_url' => 'ไฟล์',
            'an_date' => 'วันที่ประกาศ',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'views' => 'ยอดเข้าชม',
            'publish' => 'เผยแพร่'
        ];
    }
}
