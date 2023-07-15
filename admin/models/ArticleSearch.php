<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Article;

class ArticleSearch extends Article
{
    public function rules()
    {
        return [
            [['a_id', 'a_type_id', 'a_type_sub_id', 'create', 'update', 'createby', 'updateby', 'active', 'publish', 'views'], 'integer'],
            [['a_title', 'a_detail', 'a_img'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Article::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
            'sort' => [
                'defaultOrder' => [
                    'a_id' => SORT_DESC,
                ]
            ]
        ]);

        $dataProvider->sort->attributes['a_type_id'] = [
            'asc' => ['article_type.a_type_name' => SORT_ASC],
            'desc' => ['article_type.a_type_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'a_id' => $this->a_id,
            'a_type_id' => $this->a_type_id,
            'a_type_sub_id' => $this->a_type_sub_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'active' => 1,
            'publish' => $this->publish,
            'views' => $this->views,
        ]);

        $query->andFilterWhere(['like', 'a_title', $this->a_title])
            ->andFilterWhere(['like', 'a_detail', $this->a_detail])
            ->andFilterWhere(['like', 'a_img', $this->a_img]);

        return $dataProvider;
    }
}
