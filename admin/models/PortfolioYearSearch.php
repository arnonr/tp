<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PortfolioYear;

class PortfolioYearSearch extends PortfolioYear
{
    public function rules()
    {
        return [
            [['port_year_id', 'create', 'update', 'createby', 'updateby', 'active','order'], 'integer'],
            [['port_year_name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PortfolioYear::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
            'sort' => [
                'defaultOrder' => [
                    'port_year_id' => SORT_DESC,
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'port_year_id' => $this->port_year_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'order' => $this->order,
            'active' => 1,
        ]);

        $query->andFilterWhere(['like', 'port_year_name', $this->port_year_name]);

        return $dataProvider;
    }
}
