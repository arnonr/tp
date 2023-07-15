<?php

namespace app\models;
use Yii;

class NewsType extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'news_type';
    }

    public function rules()
    {
        return [
            [['n_type_name'], 'required'],
            [['create', 'update', 'createby', 'updateby', 'active','order'], 'integer'],
            [['n_type_name','tag'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'n_type_id' => 'ประเภทข่าว',
            'n_type_name' => 'ประเภทข่าว',
            'create' => 'วันที่สร้าง',
            'update' => 'วันที่แก้ไข',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'order' => 'ลำดับ',
            'tag' => 'tag ลับ',
        ];
    }
}
