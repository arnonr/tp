<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;

class TgdePortfolio extends \yii\db\ActiveRecord
{
    public $tp_img_old;
    public static function tableName()
    {
        return 'tgde_portfolio';
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
            [['tp_title'], 'required'],
            [['tp_detail'], 'string'],
            [['create', 'update', 'createby', 'updateby', 'active', 'publish', 'views','tp_year_id'], 'integer'],
            [['tp_title', 'tp_img'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'tp_id' => 'ผลงาน',
            'tp_year_id' => 'ปีผลงาน',
            'tp_title' => 'ผลงาน',
            'tp_detail' => 'เนื้อหา',
            'tp_img' => 'รูปภาพปก',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'views' => 'ยอดเข้าชม',
            'publish' => 'เผยแพร่',
        ];
    }

    public function getTgdePortfolioYear()
    {
        return $this->hasOne(TgdePortfolioYear::className(), ['tp_year_id' => 'tp_year_id']);
    }
}
