<?php

use yii\db\Migration;

/**
 * Handles adding is_available_full_page to table `content_type`.
 */
class m200224_072317_add_is_available_full_page_column_to_content_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('content_type', 'is_available_full_page', $this->boolean()->notNull()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('content_type', 'is_available_full_page');
    }
}
