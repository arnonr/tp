<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ArticleType;

class ArticleTypeSearch extends ArticleType
{
    public function rules()
    {
        return [
            [['a_type_id', 'create', 'update', 'createby', 'updateby', 'active'], 'integer'],
            [['a_type_name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = ArticleType::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
            'sort' => [
                'defaultOrder' => [
                    'a_type_id' => SORT_ASC,
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'a_type_id' => $this->a_type_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'active' => 1,
        ]);

        $query->andFilterWhere(['like', 'a_type_name', $this->a_type_name]);

        return $dataProvider;
    }
}
