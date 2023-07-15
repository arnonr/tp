<?php
namespace app\models;
use Yii;

class NewsAnnouce extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'news_annouce';
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
            'an_date' => 'วันที่ประกาศ',
            'an_title' => 'ข่าวประกาศ',
            'an_url' => 'ไฟล์',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'publish' => 'เผยแพร่',
            'views' => 'ผู้เข้าชม',
        ];
    }
}
