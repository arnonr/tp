<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;
use himiklab\sortablegrid\SortableGridBehavior;

class Department extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'department';
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
            [['dep_name'], 'required'],
            [['create', 'update', 'createby', 'updateby', 'active', 'publish', 'order'], 'integer'],
            [['dep_name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'dep_id' => 'หน่วยงาน',
            'dep_name' => 'หน่วยงาน',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'publish' => 'เผยแพร่',
            'order' => 'ลำดับ',
        ];
    }
}
