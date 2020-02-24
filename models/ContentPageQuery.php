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

    /**
     * Только доступные как отдельная страница
     * @return ContentPageQuery
     */
    public function isAvailableFullPage(): self
    {
        return $this->joinWith(['type'])
        	->andWhere(['=', ContentType::tableName() . '.is_available_full_page', ContentType::IS_AVAILABLE_FULL_PAGE_YES]);
    }
}
