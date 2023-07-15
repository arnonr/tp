<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $dep_id Department
 * @property string $dep_name Department
 * @property int|null $create Create
 * @property int|null $update Update
 * @property int|null $createby Create By
 * @property int|null $updateby Update By
 * @property int $active Active
 * @property int $publish Publish
 * @property int|null $order
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dep_name'], 'required'],
            [['create', 'update', 'createby', 'updateby', 'active', 'publish', 'order'], 'integer'],
            [['dep_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dep_id' => 'Dep ID',
            'dep_name' => 'Dep Name',
            'create' => 'Create',
            'update' => 'Update',
            'createby' => 'Createby',
            'updateby' => 'Updateby',
            'active' => 'Active',
            'publish' => 'Publish',
            'order' => 'Order',
        ];
    }
}
