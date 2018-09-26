<?php

use yii\db\Migration;

/**
 * Class m180926_031356_banner_position_make_optional
 */
class m180926_031356_banner_position_make_optional extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%content_banner}}', 'position', $this->string()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180926_031356_banner_position_make_optional cannot be reverted.\n";
        $this->alterColumn('{{%content_banner}}', 'position', $this->string()->notNull());
        return false;
    }
}
