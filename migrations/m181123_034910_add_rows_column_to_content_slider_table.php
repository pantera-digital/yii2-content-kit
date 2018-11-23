<?php

use yii\db\Migration;

/**
 * Handles adding rows to table `content_slider`.
 */
class m181123_034910_add_rows_column_to_content_slider_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('content_slider', 'row_1', $this->text()->null());
        $this->addColumn('content_slider', 'row_2', $this->text()->null());
        $this->addColumn('content_slider', 'row_3', $this->text()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('content_slider', 'row_1');
        $this->dropColumn('content_slider', 'row_2');
        $this->dropColumn('content_slider', 'row_3');
    }
}
