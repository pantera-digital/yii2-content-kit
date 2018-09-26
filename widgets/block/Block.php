<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 9/26/18
 * Time: 12:10 PM
 */

namespace pantera\content\widgets\block;


use pantera\content\models\ContentBlock;
use yii\base\Widget;

class Block extends Widget
{
    /* @var int Идентификатор блока */
    public $blockId;

    public function run()
    {
        parent::run();
        $block = ContentBlock::find()
            ->isActive()
            ->andWhere(['=', ContentBlock::tableName() . '.id', $this->blockId])
            ->one();
        if ($block) {
            return $block->body;
        }
    }
}