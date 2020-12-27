<?php

use yii\db\Migration;

/**
 * Handles adding sort to table `content_slider`.
 */
class m201227_062238_add_sort_column_to_content_slider_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%content_slider}}', 'sort', $this->integer()->defaultValue(0)->after('status'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%content_slider}}', 'sort');
    }
}
