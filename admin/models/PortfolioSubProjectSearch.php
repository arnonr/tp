<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PortfolioSubProject;

class PortfolioSubProjectSearch extends PortfolioSubProject
{
    public function rules()
    {
        return [
            [['port_pro_id','port_sub_pro_id', 'create', 'update', 'createby', 'updateby', 'active','order'], 'integer'],
            [['port_sub_pro_name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PortfolioSubProject::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
            'sort' => [
                'defaultOrder' => [
                    'order' => SORT_ASC
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'port_sub_pro_id' => $this->port_sub_pro_id,
            'port_pro_id' => $this->port_pro_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'active' => 1,
            'order' => $this->order
        ]);

        $query->andFilterWhere(['like', 'port_sub_pro_name', $this->port_sub_pro_name]);

        return $dataProvider;
    }
}
