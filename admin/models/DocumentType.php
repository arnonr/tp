<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;
use himiklab\sortablegrid\SortableGridBehavior;

class DocumentType extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'document_type';
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
            'doc_type_main_id' => 'หน่วยงาน',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'order' => 'ลำดับ',
        ];
    }
}
