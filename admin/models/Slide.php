<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;
use himiklab\sortablegrid\SortableGridBehavior;

class Slide extends \yii\db\ActiveRecord
{
    public $slide_url_old;
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

    public static function tableName()
    {
        return 'slide';
    }

    public function rules()
    {
        return [
            [['slide_url', 'slide_link','slide_target_link'], 'string'],
            [['create', 'update', 'createby', 'updateby', 'active', 'order', 'publish'], 'integer'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'slide_id' => 'สไลด์',
            'slide_url' => 'สไลด์',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'order' => 'ลำดับ',
            'slide_link' => 'Slide Link',
            'publish' => 'Publish',
            'slide_target_link' => 'Target',
        ];
    }
}
