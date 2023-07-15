<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Team;

class TeamSearch extends Team
{
    public function rules()
    {
        return [
            [['t_id', 'create', 'update', 'createby', 'updateby', 'active', 'publish', 'dep_id', 'order'], 'integer'],
            [['t_fname', 't_lname', 't_position', 't_level', 't_phone', 't_mail', 't_prefix', 't_img'], 'safe'],
        ];
    }
    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Team::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
            'sort' => [
                'defaultOrder' => [
                    'order' => SORT_ASC,
                ]
            ]
        ]);

        $dataProvider->sort->attributes['dep_id'] = [
            'asc' => ['department.dep_name' => SORT_ASC],
            'desc' => ['department.dep_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            't_id' => $this->t_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'active' => 1,
            'publish' => $this->publish,
            'dep_id' => $this->dep_id,
            'order' => $this->order,
        ]);

        $query->andFilterWhere(['like', 't_fname', $this->t_fname])
            ->andFilterWhere(['like', 't_lname', $this->t_lname])
            ->andFilterWhere(['like', 't_position', $this->t_position])
            ->andFilterWhere(['like', 't_level', $this->t_level])
            ->andFilterWhere(['like', 't_phone', $this->t_phone])
            ->andFilterWhere(['like', 't_mail', $this->t_mail])
            ->andFilterWhere(['like', 't_prefix', $this->t_prefix])
            ->andFilterWhere(['like', 't_img', $this->t_img]);

        return $dataProvider;
    }
}
