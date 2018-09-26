<?php

namespace pantera\content\models;

/**
 * This is the ActiveQuery class for [[ContentBanner]].
 *
 * @see ContentBanner
 */
class ContentBannerQuery extends \yii\db\ActiveQuery
{
    /**
     * Только активные
     * @return ContentBannerQuery
     */
    public function isActive(): self
    {
        return $this->andWhere(['=', ContentBanner::tableName() . '.status', ContentBanner::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     * @return ContentBanner[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ContentBanner|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
