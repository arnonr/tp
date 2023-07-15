<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_logo".
 *
 * @property int $pro_logo_id โครงการ
 * @property string|null $pro_logo_img โลโก้โครงการ
 * @property string|null $pro_logo_link ลิ้งค์
 * @property int|null $create วันที่สร้าง
 * @property int|null $update แก้ไขล่าสุด
 * @property int|null $createby ผู้สร้าง
 * @property int|null $updateby ผู้แก้ไข
 * @property int $active สถานะ
 * @property int|null $order ลำดับ
 * @property int $publish เผยแพร่
 */
class ProjectLogo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_logo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create', 'update', 'createby', 'updateby', 'active', 'order', 'publish'], 'integer'],
            [['pro_logo_img'], 'string', 'max' => 255],
            [['pro_logo_link'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pro_logo_id' => 'Pro Logo ID',
            'pro_logo_img' => 'Pro Logo Img',
            'pro_logo_link' => 'Pro Logo Link',
            'create' => 'Create',
            'update' => 'Update',
            'createby' => 'Createby',
            'updateby' => 'Updateby',
            'active' => 'Active',
            'order' => 'Order',
            'publish' => 'Publish',
        ];
    }
}
