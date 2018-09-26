<?php

namespace pantera\content\models;

/**
 * This is the ActiveQuery class for [[ContentSlider]].
 *
 * @see ContentSlider
 */
class ContentSliderQuery extends \yii\db\ActiveQuery
{
    /**
     * Только активные
     * @return ContentSliderQuery
     */
    public function isActive(): self
    {
        return $this->andWhere(['=', ContentSlider::tableName() . '.status', ContentSlider::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     * @return ContentSlider[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ContentSlider|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
