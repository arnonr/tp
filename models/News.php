<?php
namespace app\models;

use Yii;

class News extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'news';
    }

    public function rules()
    {
        return [
            [['n_type_id', 'n_title'], 'required'],
            [['n_type_id', 'create', 'update', 'createby', 'updateby', 'active', 'publish', 'views'], 'integer'],
            [['n_detail'], 'string'],
            [['n_title', 'n_img'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'n_id' => 'ข่าว',
            'n_type_id' => 'ประเภทข่าว',
            'n_title' => 'หัวข้อข่าว',
            'n_detail' => 'เนื้อหาข่าว',
            'n_img' => 'รูปภาพปก',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'publish' => 'เผยแพร่',
            'views' => 'ผู้เข้าชม',
        ];
    }

    public function getNewsType()
    {
        return $this->hasOne(NewsType::className(), ['n_type_id' => 'n_type_id']);
    }
}
