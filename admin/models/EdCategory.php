<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;
use himiklab\sortablegrid\SortableGridBehavior;

class EdCategory extends \yii\db\ActiveRecord
{
    public $ed_cat_img_old;
    public static function tableName()
    {
        return 'ed_category';
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
            [['ed_cat_name','ed_type_id'], 'required'],
            [['ed_type_id', 'order', 'create', 'update', 'createby', 'updateby', 'active', 'publish'], 'integer'],
            [['ed_cat_min_detail','ed_cat_img'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'ed_cat_id' => 'หัวข้อหลัก',
            'ed_type_id' => 'ประเภท',
            'ed_cat_name' => 'หัวข้อหลัก',
            'ed_cat_min_detail' => 'รายละเอียโดยย่อ',
            'ed_cat_img' => 'รูปภาพปก',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'order' => 'ลำดับ',
            'active' => 'สถานะ',
            'publish' => 'เผยแพร่',

        ];
    }

    public function getEdType()
    {
        return $this->hasOne(EdType::className(), ['ed_type_id' => 'ed_type_id']);
    }
}
