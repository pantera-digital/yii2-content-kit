<?php

use yii\db\Migration;

/**
 * Handles adding available_url to table `content_banner`.
 */
class m180926_030300_add_available_url_column_to_content_banner_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('content_banner', 'available_url', $this->string()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('content_banner', 'available_url');
    }
}
