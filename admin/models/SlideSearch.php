<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Slide;

class SlideSearch extends Slide
{
    public function rules()
    {
        return [
            [['slide_id', 'create', 'update', 'createby', 'updateby', 'active', 'order', 'publish'], 'integer'],
            [['slide_url', 'slide_link','slide_target_link'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Slide::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'slide_id' => $this->slide_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'active' => 1,
            'order' => $this->order,
            'publish' => $this->publish,
        ]);

        $query->andFilterWhere(['like', 'slide_url', $this->slide_url])
            ->andFilterWhere(['like', 'slide_target_link', $this->slide_target_link])
            ->andFilterWhere(['like', 'slide_link', $this->slide_link]);

        return $dataProvider;
    }
}
