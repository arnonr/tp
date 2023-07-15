<?php
namespace app\models;
use Yii;

class Km extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'km';
    }

    public function rules()
    {
        return [
            [['km_title'], 'required'],
            [['km_detail'], 'string'],
            [['create', 'update', 'createby', 'updateby', 'active', 'views', 'publish'], 'integer'],
            [['km_title', 'km_img', 'km_writer'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'km_id' => 'หัวข้อ',
            'km_title' => 'หัวข้อ',
            'km_detail' => 'รายละเอียด',
            'km_img' => 'รูปภาพ',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'views' => 'ผู้เข้าชม',
            'publish' => 'เผยแพร่',
            'km_writer' => 'ผู้เขียน',
        ];
    }
}
