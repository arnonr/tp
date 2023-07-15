<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DocumentType;

class DocumentTypeSearch extends DocumentType
{
    public function rules()
    {
        return [
            [['doc_type_id', 'doc_type_main_id', 'create', 'update', 'createby', 'updateby', 'active', 'order'], 'integer'],
            [['doc_type_name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = DocumentType::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 50 ],
            'sort' => [
                'defaultOrder' => [
                    'order' => SORT_ASC,
                    'doc_type_id' => SORT_DESC,
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'doc_type_id' => $this->doc_type_id,
            'doc_type_main_id' => $this->doc_type_main_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'order' => $this->order,
            'active' => 1,
        ]);

        $query->andFilterWhere(['like', 'doc_type_name', $this->doc_type_name]);

        return $dataProvider;
    }
}
