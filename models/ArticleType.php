<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article_type".
 *
 * @property int $art_type_id
 * @property string|null $art_type_name
 * @property int|null $create
 * @property int|null $update
 * @property int|null $createby
 * @property int|null $updateby
 * @property int $active
 */
class ArticleType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create', 'update', 'createby', 'updateby', 'active'], 'integer'],
            [['a_type_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'a_type_id' => 'Art Type ID',
            'a_type_name' => 'Art Type Name',
            'create' => 'Create',
            'update' => 'Update',
            'createby' => 'Createby',
            'updateby' => 'Updateby',
            'active' => 'Active',
        ];
    }
}
