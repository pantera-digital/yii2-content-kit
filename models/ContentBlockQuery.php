<?php

namespace pantera\content\models;

/**
 * This is the ActiveQuery class for [[ContentBlock]].
 *
 * @see ContentBlock
 */
class ContentBlockQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

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
