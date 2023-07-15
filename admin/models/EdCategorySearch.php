<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EdCategory;

class EdCategorySearch extends EdCategory
{
    public function rules()
    {
        return [
            [['ed_cat_id','ed_type_id', 'create', 'update', 'createby', 'updateby', 'active','order', 'publish'], 'integer'],
            [['ed_cat_name', 'ed_cat_min_detail', 'ed_cat_img'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = EdCategory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 20 ],
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
            'ed_cat_id' => $this->ed_cat_id,
            'ed_type_id' => $this->ed_type_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'order' => $this->order,
            'updateby' => $this->updateby,
            'publish' => $this->publish,
            'active' => 1,
        ]);

        $query->andFilterWhere(['like', 'ed_cat_name', $this->ed_cat_name])
            ->andFilterWhere(['like', 'ed_cat_min_detail', $this->ed_cat_min_detail])
            ->andFilterWhere(['like', 'ed_cat_img', $this->ed_cat_img]);

        return $dataProvider;
    }
}
