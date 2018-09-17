<?php

use yii\db\Migration;

/**
 * Handles the creation of table `content_page`.
 * Has foreign keys to the tables:
 *
 * - `content_type`
 */
class m180917_063605_create_content_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%content_page}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'body' => $this->text()->null(),
            'type_id' => $this->integer()->notNull(),
            'status' => $this->boolean()->notNull()->defaultValue(1),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `type_id`
        $this->createIndex(
            'idx-content_page-type_id',
            '{{%content_page}}',
            'type_id'
        );

        // add foreign key for table `content_type`
        $this->addForeignKey(
            'fk-content_page-type_id',
            '{{%content_page}}',
            'type_id',
            '{{%content_type}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `content_type`
        $this->dropForeignKey(
            'fk-content_page-type_id',
            '{{%content_page}}'
        );

        // drops index for column `type_id`
        $this->dropIndex(
            'idx-content_page-type_id',
            '{{%content_page}}'
        );

        $this->dropTable('{{%content_page}}');
    }
}
