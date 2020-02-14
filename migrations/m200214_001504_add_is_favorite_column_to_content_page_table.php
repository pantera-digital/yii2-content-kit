<?php

use yii\db\Migration;

/**
 * Handles adding is_favorite to table `content_page`.
 */
class m200214_001504_add_is_favorite_column_to_content_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('content_page', 'is_favorite', $this->boolean()->notNull()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('content_page', 'is_favorite');
    }
}
