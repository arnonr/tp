<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;

class PortfolioYear extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'eec_portfolio_year';
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
            [['port_year_name'], 'required'],
            [['create', 'update', 'createby', 'updateby', 'active','order'], 'integer'],
            [['port_year_name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'port_year_id' => 'ปี พ.ศ.',
            'port_year_name' => 'ปี พ.ศ.',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'order' => 'ลำดับ'
        ];
    }
}
