<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Portfolio;

class PortfolioSearch extends Portfolio
{
    public function rules()
    {
        return [
            [['p_id', 'create', 'update', 'createby', 'updateby', 'active', 'publish', 'views','port_sub_pro_id','order'], 'integer'],
            [['p_title', 'p_detail', 'p_img'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Portfolio::find();

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
            'p_id' => $this->p_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'active' => 1,
            'port_sub_pro_id' => $this->port_sub_pro_id,
            'publish' => $this->publish,
            'views' => $this->views,
            'order' => $this->order,
        ]);

        $query->andFilterWhere(['like', 'p_title', $this->p_title])
            ->andFilterWhere(['like', 'p_detail', $this->p_detail])
            ->andFilterWhere(['like', 'p_img', $this->p_img]);

        return $dataProvider;
    }
}
