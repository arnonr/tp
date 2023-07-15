<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EdCategory;

class EdSubCategorySearch extends EdSubCategory
{
    public function rules()
    {
        return [
            [['ed_cat_id','ed_sub_cat_id', 'create', 'update', 'createby', 'updateby', 'active','order','publish'], 'integer'],
            [['ed_sub_cat_name', 'ed_sub_cat_detail'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = EdSubCategory::find();

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
            'ed_sub_cat_id' => $this->ed_sub_cat_id,
            'ed_cat_id' => $this->ed_cat_id,
            'create' => $this->create,
            'update' => $this->update,
            'order' => $this->order,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'publish' => $this->publish,
            'active' => 1,
        ]);

        $query->andFilterWhere(['like', 'ed_sub_cat_name', $this->ed_sub_cat_name])
            ->andFilterWhere(['like', 'ed_sub_cat_detail', $this->ed_sub_cat_detail]);

        return $dataProvider;
    }
}
