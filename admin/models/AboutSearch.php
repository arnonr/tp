<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\About;

class AboutSearch extends About
{
    public function rules()
    {
        return [
            [['ab_id', 'create', 'update', 'createby', 'updateby', 'active', 'views'], 'integer'],
            [['ab_title', 'ab_detail'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = About::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
            'sort' => [
                'defaultOrder' => [
                    'ab_id' => SORT_ASC,
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ab_id' => $this->ab_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'active' => 1,
            'views' => $this->views,
        ]);

        $query->andFilterWhere(['like', 'ab_title', $this->ab_title])
            ->andFilterWhere(['like', 'ab_detail', $this->ab_detail]);

        return $dataProvider;
    }
}
