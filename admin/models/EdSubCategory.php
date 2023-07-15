<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;
use himiklab\sortablegrid\SortableGridBehavior;

class EdSubCategory extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'ed_sub_category';
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
            [['ed_sub_cat_name','ed_cat_id'], 'required'],
            [['ed_cat_id', 'order', 'create', 'update', 'createby', 'updateby', 'active','publish'], 'integer'],
            [['ed_sub_cat_name', 'ed_sub_cat_detail'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'ed_sub_cat_id' => 'หัวข้อย่อย',
            'ed_cat_id' => 'หัวข้อหลัก',
            'ed_sub_cat_name' => 'หัวข้อย่อย',
            'ed_sub_cat_detail' => 'รายละเอียด',
            'order' => 'ลำดับ',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'publish' => 'เผยแพร่',
        ];
    }

    public function getEdCategory()
    {
        return $this->hasOne(EdCategory::className(), ['ed_cat_id' => 'ed_cat_id']);
    }
}
