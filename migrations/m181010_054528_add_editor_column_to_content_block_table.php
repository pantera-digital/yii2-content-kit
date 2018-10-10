<?php

use yii\db\Migration;

/**
 * Handles adding editor to table `content_block`.
 */
class m181010_054528_add_editor_column_to_content_block_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('content_block', 'editor', $this->boolean()->notNull()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('content_block', 'editor');
    }
}
