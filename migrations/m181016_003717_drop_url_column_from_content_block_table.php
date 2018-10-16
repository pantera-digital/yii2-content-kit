<?php

use yii\db\Migration;

/**
 * Handles dropping url from table `content_block`.
 */
class m181016_003717_drop_url_column_from_content_block_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%content_block}}', 'url');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%content_block}}', 'url', $this->string()->null());
    }
}
