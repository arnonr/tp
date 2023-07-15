<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;

class About extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'about';
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
            [['ab_title'], 'required'],
            [['ab_detail'], 'string'],
            [['create', 'update', 'createby', 'updateby', 'active', 'views'], 'integer'],
            [['ab_title'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'ab_id' => 'เกี่ยวกับเรา',
            'ab_title' => 'เกี่ยวกับเรา',
            'ab_detail' => 'เนื้อหา',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'views' => 'ยอดเข้าชม',
        ];
    }
}
