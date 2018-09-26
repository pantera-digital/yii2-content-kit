<?php

namespace pantera\content\models;

/**
 * This is the ActiveQuery class for [[ContentSlider]].
 *
 * @see ContentSlider
 */
class ContentSliderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

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
