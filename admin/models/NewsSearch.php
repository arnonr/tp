<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\News;

class NewsSearch extends News
{
    public function rules()
    {
        return [
            [['n_id', 'n_type_id', 'create', 'update', 'createby', 'updateby', 'active', 'publish', 'views'], 'integer'],
            [['n_title', 'n_detail', 'n_img'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = News::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
            'sort' => [
                'defaultOrder' => [
                    'n_id' => SORT_DESC,
                ]
            ]
        ]);

        $dataProvider->sort->attributes['n_type_id'] = [
            'asc' => ['news_type.n_type_name' => SORT_ASC],
            'desc' => ['news_type.n_type_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'n_id' => $this->n_id,
            'n_type_id' => $this->n_type_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'active' => 1,
            'publish' => $this->publish,
            'views' => $this->views,
        ]);

        $query->andFilterWhere(['like', 'n_title', $this->n_title])
            ->andFilterWhere(['like', 'n_detail', $this->n_detail])
            ->andFilterWhere(['like', 'n_img', $this->n_img]);

        return $dataProvider;
    }
}
