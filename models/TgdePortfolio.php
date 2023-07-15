<?php
namespace app\models;

use Yii;

class TgdePortfolio extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'tgde_portfolio';
    }

    public function rules()
    {
        return [
            [['tp_year_id', 'tp_title'], 'required'],
            [['tp_year_id', 'create', 'update', 'createby', 'updateby', 'active', 'publish', 'views'], 'integer'],
            [['tp_detail'], 'string'],
            [['tp_title', 'tp_img'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'tp_id' => 'ข่าว',
            'tp_year_id' => 'ประเภทข่าว',
            'tp_title' => 'หัวข้อข่าว',
            'tp_detail' => 'เนื้อหาข่าว',
            'tp_img' => 'รูปภาพปก',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'publish' => 'เผยแพร่',
            'views' => 'ผู้เข้าชม',
        ];
    }

    public function getTgdePortfolioYear()
    {
        return $this->hasOne(TgdePortfolioYear::className(), ['tp_year_id' => 'tp_year_id']);
    }
}
