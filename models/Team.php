<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property int $t_id People
 * @property string|null $t_fname Firstname
 * @property string|null $t_lname Lastname
 * @property string|null $t_position Position
 * @property string|null $t_level Level
 * @property string|null $t_phone Phone
 * @property string|null $t_mail Email
 * @property string|null $t_prefix Prefix
 * @property string|null $t_img Photo
 * @property int|null $create Create
 * @property int|null $update Update
 * @property int|null $createby Create By
 * @property int|null $updateby Update By
 * @property int $active Active
 * @property int $publish Pubish
 * @property int $dep_id Department
 * @property int|null $order
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create', 'update', 'createby', 'updateby', 'active', 'publish', 'dep_id', 'order'], 'integer'],
            [['dep_id'], 'required'],
            [['t_fname', 't_lname', 't_position', 't_level', 't_phone', 't_mail', 't_img'], 'string', 'max' => 255],
            [['t_prefix'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            't_id' => 'T ID',
            't_fname' => 'T Fname',
            't_lname' => 'T Lname',
            't_position' => 'T Position',
            't_level' => 'T Level',
            't_phone' => 'T Phone',
            't_mail' => 'T Mail',
            't_prefix' => 'T Prefix',
            't_img' => 'T Img',
            'create' => 'Create',
            'update' => 'Update',
            'createby' => 'Createby',
            'updateby' => 'Updateby',
            'active' => 'Active',
            'publish' => 'Publish',
            'dep_id' => 'Dep ID',
            'order' => 'Order',
        ];
    }
}
