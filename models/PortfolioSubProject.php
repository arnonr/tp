<?php
namespace app\models;

use Yii;

class PortfolioSubProject extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'eec_portfolio_sub_project';
    }
    
    public function rules()
    {
        return [
            [['port_sub_pro_name'], 'required'],
            [['create', 'update', 'createby', 'updateby', 'active','order'], 'integer'],
            [['port_pro_id'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'port_sub_pro_id' => 'ชื่อโครงการย่อย',
            'port_sub_pro_name' => 'ชื่อโครงการย่อย',
            'port_pro_id' => 'ชื่อโครงการหลัก',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'order' => 'ลำดับ'
        ];
    }

    public function getPortfolioProject()
    {
        return $this->hasOne(PortfolioProject::className(), ['port_pro_id' => 'port_pro_id']);
    }
}
