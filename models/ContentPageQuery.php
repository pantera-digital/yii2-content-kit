<?php

namespace pantera\content\models;

/**
 * This is the ActiveQuery class for [[ContentPage]].
 *
 * @see ContentPage
 */
class ContentPageQuery extends \yii\db\ActiveQuery
{
    /**
     * Только активные
     * @return ContentPageQuery
     */
    public function isActive(): self
    {
        return $this->andWhere(['=', ContentPage::tableName() . '.status', ContentPage::STATUS_ACTIVE]);
    }
}
