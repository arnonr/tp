<?php
namespace app\models;

use Yii;

class Document extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'document';
    }

    public function rules()
    {
        return [
            [['doc_title', 'doc_type_id'], 'required'],
            [['doc_type_id', 'create', 'update', 'createby', 'updateby', 'active', 'publish', 'views', 'order'], 'integer'],
            [['doc_title', 'doc_url'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'doc_id' => 'เอกสารดาวน์โหลด',
            'doc_title' => 'เอกสารดาวน์โหลด',
            'doc_type_id' => 'ประเภทเอกสาร',
            'doc_url' => 'ไฟล์',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'publish' => 'เผยแพร่',
            'views' => 'ผู้เข้าชม',
            'order' => 'ลำดับ',
        ];
    }

    public function getDocumentType()
    {
        return $this->hasOne(DocumentType::className(), ['doc_type_id' => 'doc_type_id']);
    }
}
