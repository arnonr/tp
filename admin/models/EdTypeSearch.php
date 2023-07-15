<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EdType;

class EdTypeSearch extends EdType
{
    public function rules()
    {
        return [
            [['ed_type_id', 'create', 'update', 'createby', 'updateby', 'active'], 'integer'],
            [['ed_type_name', 'ed_type_detail', 'ed_type_min_detail', 'ed_type_img'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = EdType::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
            'sort' => [
                'defaultOrder' => [
                    'ed_type_id' => SORT_ASC,
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ed_type_id' => $this->ed_type_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'active' => 1,
        ]);

        $query->andFilterWhere(['like', 'ed_type_name', $this->ed_type_name])
            ->andFilterWhere(['like', 'ed_type_detail', $this->ed_type_detail])
            ->andFilterWhere(['like', 'ed_type_min_detail', $this->ed_type_min_detail])
            ->andFilterWhere(['like', 'ed_type_img', $this->ed_type_img]);

        return $dataProvider;
    }
}
