<?php

namespace pantera\content\models;

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
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Поиск записей по ключу типа
     * @param string|array $types Ключ типа
     * @return ActiveDataProvider
     */
    public function search($types): ActiveDataProvider
    {
        if (!is_array($types)) {
            $types = [$types];
        }
        $query = ContentPage::find()
            ->joinWith(['type'])
            ->isActive()
            ->andWhere([ContentType::tableName() . '.key' => $types]);
        return new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
            ],
        ]);
    }
}
