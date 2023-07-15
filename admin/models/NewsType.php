<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;

class NewsType extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'news_type';
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
            [['n_type_name'], 'required'],
            [['create', 'update', 'createby', 'updateby', 'active'], 'integer'],
            [['n_type_name', 'tag'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'n_type_id' => 'ประเภทข่าว',
            'n_type_name' => 'ประเภทข่าว',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'tag' => 'แท็ก',
        ];
    }
}
