<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;
use himiklab\sortablegrid\SortableGridBehavior;

class ProjectLogo extends \yii\db\ActiveRecord
{
    public $pro_logo_img_old;

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
        return 'project_logo';
    }

    public function rules()
    {
        return [
            [['create', 'update', 'createby', 'updateby', 'active', 'order', 'publish'], 'integer'],
            [['pro_logo_img'], 'string', 'max' => 255],
            [['pro_logo_link'], 'string', 'max' => 500],
        ];
    }

    public function attributeLabels()
    {
        return [
            'pro_logo_id' => 'โครงการ',
            'pro_logo_img' => 'โลโก้โครงการ',
            'pro_logo_link' => 'ลิ้งค์',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'order' => 'ลำดับ',
            'publish' => 'เผยแพร่',
        ];
    }
}
