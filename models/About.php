<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "about".
 *
 * @property int $ab_id About us
 * @property string $ab_title About us
 * @property string|null $ab_detail Detail
 * @property int|null $create Create
 * @property int|null $update Update
 * @property int|null $createby Create By
 * @property int|null $updateby Update By
 * @property int $active Active
 * @property int $views Views
 */
class About extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ab_title'], 'required'],
            [['ab_detail'], 'string'],
            [['create', 'update', 'createby', 'updateby', 'active', 'views'], 'integer'],
            [['ab_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ab_id' => 'Ab ID',
            'ab_title' => 'Ab Title',
            'ab_detail' => 'Ab Detail',
            'create' => 'Create',
            'update' => 'Update',
            'createby' => 'Createby',
            'updateby' => 'Updateby',
            'active' => 'Active',
            'views' => 'Views',
        ];
    }
}
