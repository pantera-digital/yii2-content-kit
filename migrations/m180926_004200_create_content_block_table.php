<?php

use yii\db\Migration;

/**
 * Handles the creation of table `content_block`.
 */
class m180926_004200_create_content_block_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%content_block}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'body' => $this->text()->null(),
            'wysiwyg' => $this->boolean()->notNull()->defaultValue(1),
            'status' => $this->boolean()->notNull()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%content_block}}');
    }
}
