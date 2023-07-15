<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Document;

class DocumentSearch extends Document
{
    
    public function rules()
    {
        return [
            [['doc_id', 'doc_type_id', 'create', 'update', 'createby', 'updateby', 'active', 'publish', 'views', 'order','doc_type_main_id'], 'integer'],
            [['doc_title', 'doc_url'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Document::find()->joinWith(['documentType']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 50 ],
            'sort' => [
                'defaultOrder' => [
                    // 'document_type.order' => SORT_ASC,
                    'order' => SORT_ASC,
                ]
            ]
        ]);

        $dataProvider->sort->attributes['doc_type_id'] = [
            'asc' => ['document_types.doc_type_name' => SORT_ASC],
            'desc' => ['document_types.doc_type_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'doc_id' => $this->doc_id,
            'document.doc_type_id' => $this->doc_type_id,
            'create' => $this->create,
            'update' => $this->update,
            'createby' => $this->createby,
            'updateby' => $this->updateby,
            'document.active' => 1,
            'publish' => $this->publish,
            'order' => $this->order,
            'views' => $this->views,
            'doc_type_main_id' => $this->doc_type_main_id
        ]);

        $query->andFilterWhere(['like', 'doc_title', $this->doc_title])
            ->andFilterWhere(['like', 'doc_url', $this->doc_url]);

        return $dataProvider;
    }
}
