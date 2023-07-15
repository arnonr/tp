<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;

class News extends \yii\db\ActiveRecord
{
    public $n_img_old;
    public static function tableName()
    {
        return 'news';
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
            [['n_title'], 'required'],
            [['n_detail'], 'string'],
            [['create', 'update', 'createby', 'updateby', 'active', 'publish', 'views', 'n_type_id'], 'integer'],
            [['n_title', 'n_img'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'n_id' => 'ข่าว',
            'n_type_id' => 'ประเภทข่าว',
            'n_title' => 'ข่าว',
            'n_detail' => 'เนื้อหา',
            'n_img' => 'รูปภาพปก',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'views' => 'ยอดเข้าชม',
            'publish' => 'เผยแพร่',
        ];
    }

    public function getNewsType()
    {
        return $this->hasOne(NewsType::className(), ['n_type_id' => 'n_type_id']);
    }
}
