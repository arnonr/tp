<?php
namespace app\models;

use Yii;

class Picture extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'picture';
    }

    public function rules()
    {
        return [
            [['pic_id', 'news_id', 'create', 'update', 'createby', 'updateby', 'active'], 'integer'],
            [['pic_img'], 'string', 'max' => 255],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'pic_id' => 'Pic ID',
            'pic_img' => 'Pic Img',
            'news_id' => 'News ID',
            'create' => 'Create',
            'update' => 'Update',
            'createby' => 'Createby',
            'updateby' => 'Updateby',
            'active' => 'Active',
        ];
    }
}
