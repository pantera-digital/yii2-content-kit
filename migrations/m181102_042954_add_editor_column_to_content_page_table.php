<?php

use yii\db\Migration;

/**
 * Handles adding editor to table `content_page`.
 */
class m181102_042954_add_editor_column_to_content_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('content_page', 'editor', $this->boolean()->notNull()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('content_page', 'editor');
    }
}
