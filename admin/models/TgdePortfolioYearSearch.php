<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TgdePortfolioYear;

class TgdePortfolioYearSearch extends TgdePortfolioYear
{
    public function rules()
    {
        return [
            [['tp_year_id', 'create', 'update', 'createby', 'updateby', 'active','order'], 'integer'],
            [['tp_year_name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = TgdePortfolioYear::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
            'sort' => [
                'defaultOrder' => [
                    'tp_year_id' => SORT_DESC,
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'tp_year_id' => $this->tp_year_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'order' => $this->order,
            'active' => 1,
        ]);

        $query->andFilterWhere(['like', 'tp_year_name', $this->tp_year_name]);

        return $dataProvider;
    }
}
