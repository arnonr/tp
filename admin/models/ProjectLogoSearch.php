<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProjectLogo;

class ProjectLogoSearch extends ProjectLogo
{
    public function rules()
    {
        return [
            [['pro_logo_id', 'create', 'update', 'createby', 'updateby', 'active', 'order', 'publish'], 'integer'],
            [['pro_logo_img', 'pro_logo_link'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = ProjectLogo::find();

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
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'pro_logo_id' => $this->pro_logo_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'active' => 1,
            'order' => $this->order,
            'publish' => $this->publish,
        ]);

        $query->andFilterWhere(['like', 'pro_logo_img', $this->pro_logo_img])
            ->andFilterWhere(['like', 'pro_logo_link', $this->pro_logo_link]);

        return $dataProvider;
    }
}
