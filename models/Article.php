<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $a_id Article
 * @property string $a_title Article
 * @property string|null $a_detail Detail
 * @property string|null $a_img Cover Image
 * @property int|null $create Create
 * @property int|null $update Update
 * @property int|null $createby Create By
 * @property int|null $updateby Update By
 * @property int $active Active
 * @property int $publish Publish
 * @property int $views Views
 * @property int|null $a_type_id
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['a_title'], 'required'],
            [['a_detail'], 'string'],
            [['create', 'update', 'createby', 'updateby', 'active', 'publish', 'views', 'a_type_id'], 'integer'],
            [['a_title', 'a_img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'a_id' => 'A ID',
            'a_title' => 'A Title',
            'a_detail' => 'A Detail',
            'a_img' => 'A Img',
            'create' => 'Create',
            'update' => 'Update',
            'createby' => 'Createby',
            'updateby' => 'Updateby',
            'active' => 'Active',
            'publish' => 'Publish',
            'views' => 'Views',
            'a_type_id' => 'A Type ID',
        ];
    }

    public function getArticleType()
    {
        return $this->hasOne(ArticleType::className(), ['a_type_id' => 'a_type_id']);
    }
}
