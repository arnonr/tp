<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;

class Km extends \yii\db\ActiveRecord
{
    // public $km_img_old;
    public $km_url_old;

    public static function tableName()
    {
        return 'km';
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

    public function rules()
    {
        return [
            [['km_title'], 'required'],
            [['km_detail'], 'string'],
            [['create', 'update', 'createby', 'updateby', 'active', 'views', 'publish'], 'integer'],
            [['km_title', 'km_img', 'km_writer', 'km_url'], 'string', 'max' => 255],
            [['km_link'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'km_id' => 'หัวข้อ KM',
            'km_title' => 'หัวข้อ KM',
            'km_detail' => 'เนื้อหา',
            'km_img' => 'รูปภาพปก',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'views' => 'ยอดเข้าชม',
            'publish' => 'เผยแพร่',
            'km_writer' => 'ผู้เขียน',
            'km_url' => 'ลิ้งค์',
            'km_link' => 'ลิงค์ภายนอก'
        ];
    }
}
