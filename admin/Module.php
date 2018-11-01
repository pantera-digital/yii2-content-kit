<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 9/17/18
 * Time: 4:21 PM
 */

namespace pantera\content\admin;

use pantera\content\models\ContentType;
use function var_dump;
use Yii;

class Module extends \yii\base\Module
{
    /* @var array Массив ролей которым доступна админка */
    public $permissions = ['@'];

    public function init()
    {
        parent::init();
        ModuleAsset::register(Yii::$app->view);
    }

    public function getMenuItems()
    {
        $items = [
            ['label' => 'Type', 'url' => ['/content/type/index']],
            ['label' => 'Slider', 'url' => ['/content/slider/index']],
            ['label' => 'Block', 'url' => ['/content/block/index']],
        ];
        $types = ContentType::find()->all();
        foreach ($types as $type) {
            $items[] = ['label' => $type->name, 'url' => ['/content/page/' . $type->key]];
        }
        return [['label' => 'Content', 'url' => '#', 'icon' => 'file-text', 'items' => $items]];
    }
}