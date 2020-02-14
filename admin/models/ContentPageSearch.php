<?php

namespace pantera\content\admin\models;

use pantera\content\models\ContentPage;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ContentPageSearch represents the model behind the search form of `pantera\content\models\ContentPage`.
 */
class ContentPageSearch extends ContentPage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type_id', 'status', 'is_favorite'], 'integer'],
            [['title', 'created_at'], 'safe'],
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
        $query = ContentPage::find()
            ->joinWith(['type']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'type_id' => $this->type_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'is_favorite' => $this->is_favorite,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
