<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NewsType;

class NewsTypeSearch extends NewsType
{
    public function rules()
    {
        return [
            [['n_type_id', 'create', 'update', 'createby', 'updateby', 'active'], 'integer'],
            [['n_type_name', 'tag'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = NewsType::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
            'sort' => [
                'defaultOrder' => [
                    'n_type_id' => SORT_ASC,
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'n_type_id' => $this->n_type_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'active' => 1,
        ]);

        $query->andFilterWhere(['like', 'n_type_name', $this->n_type_name])
            ->andFilterWhere(['like', 'tag', $this->tag]);

        return $dataProvider;
    }
}
