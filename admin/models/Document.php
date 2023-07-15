<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;
use himiklab\sortablegrid\SortableGridBehavior;

class Document extends \yii\db\ActiveRecord
{
    public $doc_url_old, $doc_type_main_id, $doc_type_sub_id;
    
    public static function tableName()
    {
        return 'document';
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
            [['doc_title', 'doc_type_id'], 'required'],
            [['doc_type_id', 'create', 'update', 'createby', 'updateby', 'active', 'publish', 'views','order'], 'integer'],
            [['doc_title', 'doc_url'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'doc_id' => 'เอกสาร',
            'doc_title' => 'เอกสาร',
            'doc_type_id' => 'ประเภทเอกสาร',
            'doc_url' => 'ไฟล์',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'views' => 'ยอดเข้าชม',
            'publish' => 'เผยแพร่',
            'views' => 'ยอดดาวน์โหลด',
            'order' => 'ลำดับ',
        ];
    }

    public function getDocumentType()
    {
        return $this->hasOne(DocumentType::className(), ['doc_type_id' => 'doc_type_id']);
    }
}
