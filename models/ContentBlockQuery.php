<?php

namespace pantera\content\models;

/**
 * This is the ActiveQuery class for [[ContentBlock]].
 *
 * @see ContentBlock
 */
class ContentBlockQuery extends \yii\db\ActiveQuery
{
    /**
     * Только активные
     * @return ContentBlockQuery
     */
    public function isActive(): self
    {
        return $this->andWhere(['=', ContentBlock::tableName() . '.status', ContentBlock::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     * @return ContentBlock[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ContentBlock|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
