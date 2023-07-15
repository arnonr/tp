<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;
use himiklab\sortablegrid\SortableGridBehavior;

class Portfolio extends \yii\db\ActiveRecord
{
    public $p_img_old,  $port_year_id_show, $port_pro_id_show;

    public static function tableName()
    {
        return 'eec_portfolio';
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
            'sort' => [
                'class' => SortableGridBehavior::className(),
                'sortableAttribute' => 'order'
            ],
       ];
    }

    public function rules()
    {
        return [
            [['p_title'], 'required'],
            [['p_detail'], 'string'],
            [['create', 'update', 'createby', 'updateby', 'active', 'publish', 'views','port_sub_pro_id','order'], 'integer'],
            [['p_title', 'p_img'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'p_id' => 'หัวข้อ',
            'p_title' => 'หัวข้อ',
            'p_detail' => 'เนื้อหา',
            'p_img' => 'รูปภาพปก',
            'create' => 'วันที่สร้าง',
            'update' => 'แก้ไขล่าสุด',
            'createby' => 'ผู้สร้าง',
            'updateby' => 'ผู้แก้ไข',
            'active' => 'สถานะ',
            'views' => 'ยอดเข้าชม',
            'publish' => 'เผยแพร่',
            'port_sub_pro_id' => 'ชื่อโครงการย่อย',
            'port_year_id_show' => 'ปี',
            'port_pro_id_show' => 'โครงการหลัก',
            'order' => 'ลำดับ',
        ];
    }

    public function getPortfolioSubProject()
    {
        return $this->hasOne(PortfolioSubProject::className(), ['port_sub_pro_id' => 'port_sub_pro_id']);
    }

    public function getPortfolioPictures()
    {
        return $this->hasMany(PortfolioPicture::className(), ['p_id' => 'p_id']);
    }
}
