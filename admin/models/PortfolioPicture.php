<?php
namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;

class PortfolioPicture extends \yii\db\ActiveRecord
{
    public $gall_file;
    public static function tableName()
    {
        return 'eec_portfolio_picture';
    }

    public function behaviors()
    {
       return [
            // 'timestamp' => [
            //     'class' => TimestampBehavior::className(),
            //     'createdAtAttribute' => 'create',
            //     'updatedAtAttribute' => 'update',
            //     'value' => $this->create,
            // ], 
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
            [['p_id'], 'required'],
            [['p_id', 'create', 'update', 'createby', 'updateby', 'active'], 'integer'],
            [['port_pic_img'], 'string', 'max' => 255],
            [['gall_file'], 'file','extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'port_pic_id' => 'รูปภาพ',
            'port_pic_img' => 'รูปภาพ',
            'p_id' => 'รหัสหัวข้อ',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
        ];
    }

    public function getPortfolio()
    {
        return $this->hasOne(Portfolio::className(), ['p_id' => 'p_id']);
    }

    public function upload(){
        $this->gall_file = UploadedFile::getInstance($this, 'gall_file');
        if($this->gall_file != NULL){
           $name = time() . rand();
           $this->gall_file->saveAs('../upload/port-gallery/' . $name . '.' . $this->gall_file->extension);
           // thumbnail
           // Image::thumbnail('../upload/gallery/' . $name . '.' . $this->gall_file->extension, 595, 397)->save('../upload/gallery/thumb/' . $name . '.' . $this->gall_file->extension, ['quality' => 80]);
           $this->port_pic_img = $name . '.' . $this->gall_file->extension;
           $this->save(false);
           return true;
        }else{
           return false;
        }
    }
}
