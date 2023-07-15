<?php
namespace app\models;

use Yii;

class TgdePicture extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'tgde_picture';
    }

    public function rules()
    {
        return [
            [['pic_id', 'tp_id', 'create', 'update', 'createby', 'updateby', 'active'], 'integer'],
            [['pic_img'], 'string', 'max' => 255],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'pic_id' => 'Pic ID',
            'pic_img' => 'Pic Img',
            'tp_id' => 'Tgde Portfolio',
            'create' => 'Create',
            'update' => 'Update',
            'createby' => 'Createby',
            'updateby' => 'Updateby',
            'active' => 'Active',
        ];
    }
}
