<?php

use yii\db\Migration;

/**
 * Handles the creation of table `content_banner`.
 */
class m180926_005221_create_content_banner_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%content_banner}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'url' => $this->string()->null(),
            'body' => $this->text()->null(),
            'status' => $this->boolean()->notNull()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%content_banner}}');
    }
}
