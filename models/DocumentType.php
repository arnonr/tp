<?php
namespace app\models;

use Yii;

class DocumentType extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'document_type';
    }

    public function rules()
    {
        return [
            [['doc_type_name', 'doc_type_main_id'], 'required'],
            [['doc_type_main_id', 'create', 'update', 'createby', 'updateby', 'active', 'order'], 'integer'],
            [['doc_type_name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'doc_type_id' => 'ประเภทเอกสาร',
            'doc_type_name' => 'ประเภทเอกสาร',
            'doc_type_main_id' => 'ประเภทเอกสารหลัก',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'order' => 'ลำดับ',
        ];
    }
}
