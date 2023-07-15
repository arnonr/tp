<?php
namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;

class Picture extends \yii\db\ActiveRecord
{
    public $gall_file;
    public static function tableName()
    {
        return 'picture';
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
            [['news_id'], 'required'],
            [['news_id', 'create', 'update', 'createby', 'updateby', 'active'], 'integer'],
            [['pic_img'], 'string', 'max' => 255],
            [['gall_file'], 'file','extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'pic_id' => 'รูปภาพ',
            'pic_img' => 'รูปภาพ',
            'news_id' => 'ข่าว',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
        ];
    }

    public function getNews()
    {
        return $this->hasOne(News::className(), ['news_id' => 'n_id']);
    }

    public function upload(){
        $this->gall_file = UploadedFile::getInstance($this, 'gall_file');
        if($this->gall_file != NULL){
           $name = time() . rand();
           $this->gall_file->saveAs('../upload/gallery/' . $name . '.' . $this->gall_file->extension);
           // thumbnail
           // Image::thumbnail('../upload/gallery/' . $name . '.' . $this->gall_file->extension, 595, 397)->save('../upload/gallery/thumb/' . $name . '.' . $this->gall_file->extension, ['quality' => 80]);
           $this->pic_img = $name . '.' . $this->gall_file->extension;
           $this->save(false);
           return true;
        }else{
           return false;
        }
    }
}
