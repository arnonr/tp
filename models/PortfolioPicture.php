<?php
namespace app\models;

use Yii;

class PortfolioPicture extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'eec_portfolio_picture';
    }

    public function rules()
    {
        return [
            [['p_id'], 'required'],
            [['p_id', 'create', 'update', 'createby', 'updateby', 'active'], 'integer'],
            [['port_pic_img'], 'string', 'max' => 255],
            [['gall_file'], 'file','extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'port_pic_id' => 'รูปภาพ',
            'port_pic_img' => 'รูปภาพ',
            'p_id' => 'รหัสหัวข้อ',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
        ];
    }
}
