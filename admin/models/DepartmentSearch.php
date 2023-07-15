<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Department;

class DepartmentSearch extends Department
{
    public function rules()
    {
        return [
            [['dep_id', 'create', 'update', 'createby', 'updateby', 'active', 'publish', 'order'], 'integer'],
            [['dep_name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Department::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
            'sort' => [
                'defaultOrder' => [
                    'order' => SORT_ASC,
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'dep_id' => $this->dep_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'active' => 1,
            'publish' => $this->publish,
            'order' => $this->order,
        ]);

        $query->andFilterWhere(['like', 'dep_name', $this->dep_name]);

        return $dataProvider;
    }
}
