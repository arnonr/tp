<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Km;

/**
 * KmSearch represents the model behind the search form of `app\models\Km`.
 */
class KmSearch extends Km
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['km_id', 'create', 'update', 'createby', 'updateby', 'active', 'views', 'publish'], 'integer'],
            [['km_title', 'km_detail', 'km_img', 'km_writer'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Km::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'km_id' => $this->km_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'active' => $this->active,
            'views' => $this->views,
            'publish' => $this->publish,
        ]);

        $query->andFilterWhere(['like', 'km_title', $this->km_title])
            ->andFilterWhere(['like', 'km_detail', $this->km_detail])
            ->andFilterWhere(['like', 'km_img', $this->km_img])
            ->andFilterWhere(['like', 'km_writer', $this->km_writer]);

        return $dataProvider;
    }
}
