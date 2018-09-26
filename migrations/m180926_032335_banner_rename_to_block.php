<?php

use yii\db\Migration;

/**
 * Class m180926_032335_banner_rename_to_block
 */
class m180926_032335_banner_rename_to_block extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameTable('{{%content_banner}}', '{{%content_block}}');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180926_032335_banner_rename_to_block cannot be reverted.\n";
        $this->renameTable('{{%content_block}}', '{{%content_banner}}');
        return false;
    }
}
