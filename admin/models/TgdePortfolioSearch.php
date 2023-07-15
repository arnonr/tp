<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TgdePortfolio;

class TgdePortfolioSearch extends TgdePortfolio
{
    public function rules()
    {
        return [
            [['tp_id', 'tp_year_id', 'create', 'update', 'createby', 'updateby', 'active', 'publish', 'views'], 'integer'],
            [['tp_title', 'tp_detail', 'tp_img'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = TgdePortfolio::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
            'sort' => [
                'defaultOrder' => [
                    'tp_id' => SORT_DESC,
                ]
            ]
        ]);

        // $dataProvider->sort->attributes['tp_year_id'] = [
        //     'asc' => ['news_type.n_type_name' => SORT_ASC],
        //     'desc' => ['news_type.n_type_name' => SORT_DESC],
        // ];

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'tp_id' => $this->tp_id,
            'tp_year_id' => $this->tp_year_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'active' => 1,
            'publish' => $this->publish,
            'views' => $this->views,
        ]);

        $query->andFilterWhere(['like', 'tp_title', $this->tp_title])
            ->andFilterWhere(['like', 'tp_detail', $this->tp_detail])
            ->andFilterWhere(['like', 'tp_img', $this->tp_img]);

        return $dataProvider;
    }
}
