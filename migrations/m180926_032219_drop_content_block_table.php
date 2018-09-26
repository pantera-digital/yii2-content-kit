<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `content_block`.
 */
class m180926_032219_drop_content_block_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('content_block');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->createTable('content_block', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'body' => $this->text()->null(),
            'wysiwyg' => $this->boolean()->notNull()->defaultValue(1),
            'status' => $this->boolean()->notNull()->defaultValue(1),
        ]);
    }
}
