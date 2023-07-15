<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article_type_sub".
 *
 * @property int $a_type_sub_id
 * @property string|null $a_type_sub_name
 * @property int|null $a_type_id
 * @property int|null $create
 * @property int|null $update
 * @property int|null $createby
 * @property int|null $updateby
 * @property int $active
 */
class ArticleTypeSub extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_type_sub';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['a_type_id', 'create', 'update', 'createby', 'updateby', 'active'], 'integer'],
            [['a_type_sub_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'a_type_sub_id' => 'A Type Sub ID',
            'a_type_sub_name' => 'A Type Sub Name',
            'a_type_id' => 'A Type ID',
            'create' => 'Create',
            'update' => 'Update',
            'createby' => 'Createby',
            'updateby' => 'Updateby',
            'active' => 'Active',
        ];
    }
}
