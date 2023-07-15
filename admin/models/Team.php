<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;
use himiklab\sortablegrid\SortableGridBehavior;

class Team extends \yii\db\ActiveRecord
{
    public $t_img_old;
    public static function tableName()
    {
        return 'team';
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
            [['create', 'update', 'createby', 'updateby', 'active', 'publish', 'dep_id', 'order'], 'integer'],
            [['dep_id'], 'required'],
            [['t_fname', 't_lname', 't_position', 't_level', 't_phone', 't_mail', 't_img'], 'string', 'max' => 255],
            [['t_prefix'], 'string', 'max' => 45],
        ];
    }

    public function attributeLabels()
    {
        return [
            't_id' => 'บุคลากร',
            't_fname' => 'ชื่อ',
            't_lname' => 'นามสกุล',
            't_position' => 'ตำแหน่ง',
            't_level' => 'ระดับ',
            't_phone' => 'โทรศัพท์',
            't_mail' => 'เมล',
            't_prefix' => 'คำนำหน้า',
            't_img' => 'รูปภาพ',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'publish' => 'เผยแพร่',
            'dep_id' => 'หน่วยงาน',
            'order' => 'ลำดับ',
        ];
    }

    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['dep_id' => 'dep_id']);
    }
}
