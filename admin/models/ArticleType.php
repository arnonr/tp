<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;

class ArticleType extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'article_type';
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
            [['a_type_name'], 'required'],
            [['create', 'update', 'createby', 'updateby', 'active'], 'integer'],
            [['a_type_name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'a_type_id' => 'ประเภทบทความ',
            'a_type_name' => 'ประเภทบทความ',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
        ];
    }
}
