<?php
namespace app\models;

use Yii;

class Portfolio extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'eec_portfolio';
    }

    public function rules()
    {
        return [
            [['p_title'], 'required'],
            [['p_detail'], 'string'],
            [['create', 'update', 'createby', 'updateby', 'active', 'publish', 'views','order'], 'integer'],
            [['p_title', 'p_img'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'p_id' => 'ผลงาน',
            'p_title' => 'ผลงาน',
            'p_detail' => 'เนื้อหา',
            'p_img' => 'รูปภาพปก',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'views' => 'ยอดเข้าชม',
            'publish' => 'เผยแพร่',
            'order' => 'ลำดับ',
        ];
    }

    public function getPortfolioSubProject()
    {
        return $this->hasOne(PortfolioSubProject::className(), ['port_sub_pro_id' => 'port_sub_pro_id']);
    }

    public function getPortfolioPictures()
    {
        return $this->hasMany(PortfolioPicture::className(), ['p_id' => 'p_id']);
    }
}
