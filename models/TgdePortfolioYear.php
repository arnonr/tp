<?php
namespace app\models;

use Yii;

class TgdePortfolioYear extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'tgde_portfolio_year';
    }

    public function rules()
    {
        return [
            [['tp_year_name'], 'required'],
            [['create', 'update', 'createby', 'updateby', 'active','order'], 'integer'],
            [['tp_year_name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'tp_year_id' => 'ปี พ.ศ.',
            'tp_year_name' => 'ปี พ.ศ.',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'order' => 'ลำดับ'
        ];
    }
}
