<?php

use yii\db\Migration;

/**
 * Handles the creation of table `content_type`.
 */
class m180917_063245_create_content_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%content_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'key' => $this->string()->notNull(),
        ]);
        $this->createIndex('content_type-key', '{{%content_type}}', 'key', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%content_type}}');
    }
}
