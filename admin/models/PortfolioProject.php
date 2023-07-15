<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;
use himiklab\sortablegrid\SortableGridBehavior;

class PortfolioProject extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'eec_portfolio_project';
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
            'sort' => [
                'class' => SortableGridBehavior::className(),
                'sortableAttribute' => 'order'
            ],
       ];
    }

    public function rules()
    {
        return [
            [['port_pro_name'], 'required'],
            [['create', 'update', 'createby', 'updateby', 'active','order'], 'integer'],
            [['port_year_id'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
        	'port_pro_id' => 'ชื่อโครงการ',
            'port_pro_name' => 'ชื่อโครงการ',
            'port_year_id' => 'ปี พ.ศ.',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'order' => 'ลำดับ'
        ];
    }

    public function getPortfolioYear()
    {
        return $this->hasOne(PortfolioYear::className(), ['port_year_id' => 'port_year_id']);
    }

    public function getPortfolioProjectDropdown()
    {
        return $this->port_pro_name.' ('. $this->portfolioYear->port_year_name.')';
    }
}
