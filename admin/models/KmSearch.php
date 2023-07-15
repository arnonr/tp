<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Km;

class KmSearch extends Km
{
    public function rules()
    {
        return [
            [['km_id', 'create', 'update', 'createby', 'updateby', 'active', 'views', 'publish'], 'integer'],
            [['km_title', 'km_detail', 'km_img', 'km_writer','km_url'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Km::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
            'sort' => [
                'defaultOrder' => [
                    'km_id' => SORT_DESC,
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'km_id' => $this->km_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'active' => 1,
            'views' => $this->views,
            'publish' => $this->publish,
        ]);

        $query->andFilterWhere(['like', 'km_title', $this->km_title])
            ->andFilterWhere(['like', 'km_detail', $this->km_detail])
            ->andFilterWhere(['like', 'km_writer', $this->km_writer])
            ->andFilterWhere(['like', 'km_url', $this->km_writer])
            ->andFilterWhere(['like', 'km_img', $this->km_img]);

        return $dataProvider;
    }
}
