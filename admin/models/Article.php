<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;

class Article extends \yii\db\ActiveRecord
{
    public $a_img_old;
    public static function tableName()
    {
        return 'article';
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
            [['a_title', 'a_type_id'], 'required'],
            [['a_type_id', 'create', 'update', 'createby', 'updateby', 'active', 'publish', 'views','a_type_sub_id'], 'integer'],
            [['a_detail'], 'string'],
            [['a_title', 'a_img'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'a_id' => 'บทความ',
            'a_title' => 'หัวเรื่อง',
            'a_type_id' => 'ประเภทบทความ',
            'a_detail' => 'เนื้อหา',
            'a_img' => 'รูปภาพปก',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'views' => 'ยอดเข้าชม',
            'publish' => 'เผยแพร่',
            'a_type_sub_id' => 'หมวดหมู่ย่อย',
        ];
    }

    public function getArticleType()
    {
        return $this->hasOne(ArticleType::className(), ['a_type_id' => 'a_type_id']);
    }

    public function getArticleTypeSub()
    {
        return $this->hasOne(ArticleTypeSub::className(), ['a_type_sub_id' => 'a_type_sub_id']);
    }
}
