<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;

class EdType extends \yii\db\ActiveRecord
{
    public $ed_type_img_old;
    public static function tableName()
    {
        return 'ed_type';
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
            [['ed_type_name'], 'required'],
            [['create', 'update', 'createby', 'updateby', 'active'], 'integer'],
            [['ed_type_detail','ed_type_min_detail','ed_type_img'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'ed_type_id' => 'ประเภท',
            'ed_type_name' => 'ประเภท',
            'ed_type_detail' => 'รายละเอียด',
            'ed_type_min_detail' => 'รายละเอียโดยย่อ',
            'ed_type_img' => 'รูปภาพปก',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
        ];
    }
}
