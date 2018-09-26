<?php

use yii\db\Migration;

/**
 * Handles adding position to table `content_banner`.
 */
class m180926_022011_add_position_column_to_content_banner_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('content_banner', 'position', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('content_banner', 'position');
    }
}
