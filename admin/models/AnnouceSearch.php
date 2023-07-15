<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Annouce;

class AnnouceSearch extends Annouce
{
    public function rules()
    {
        return [
            [['an_id', 'create', 'update', 'createby', 'updateby', 'active', 'publish', 'views'], 'integer'],
            [['an_title', 'an_url','an_date'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Annouce::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
            'sort' => [
                'defaultOrder' => [
                    'an_id' => SORT_DESC,
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'an_id' => $this->an_id,
            'an_date' => $this->an_date,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'active' => 1,
            'publish' => $this->publish,
            'views' => $this->views,
        ]);

        $query->andFilterWhere(['like', 'an_title', $this->an_title])
            ->andFilterWhere(['like', 'an_url', $this->an_url]);

        return $dataProvider;
    }
}
