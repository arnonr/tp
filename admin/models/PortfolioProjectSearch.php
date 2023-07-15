<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PortfolioProject;

class PortfolioProjectSearch extends PortfolioProject
{
    public function rules()
    {
        return [
            [['port_pro_id','port_year_id', 'create', 'update', 'createby', 'updateby', 'active','order'], 'integer'],
            [['port_pro_name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PortfolioProject::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
            'sort' => [
                'defaultOrder' => [
                    'port_year_id' => SORT_DESC,
                    'order' => SORT_ASC
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'port_pro_id' => $this->port_pro_id,
            'port_year_id' => $this->port_year_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'active' => 1,
            'order' => $this->order
        ]);

        $query->andFilterWhere(['like', 'port_pro_name', $this->port_pro_name]);

        return $dataProvider;
    }
}
