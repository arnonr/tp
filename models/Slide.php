<?php
namespace app\models;
use Yii;

class Slide extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'slide';
    }

    public function rules()
    {
        return [
            [['slide_url','slide_link','slide_target_link'], 'string'],
            [['create', 'update', 'createby', 'updateby', 'active', 'order','publish'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'slide_id' => 'สไลด์',
            'slide_url' => 'สไลด์',
            'slide_link' => 'ลิงค์',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'order' => 'ลำดับ',
            'publish' => 'เผยแพร่',
            'slide_target_link' => 'Target',
        ];
    }
}
