<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 9/17/18
 * Time: 4:21 PM
 */

namespace pantera\content\admin;

class Module extends \yii\base\Module
{
    /* @var array Массив ролей которым доступна админка */
    public $permissions = ['@'];

    public function getMenuItems()
    {
        return [['label' => 'Content', 'url' => '#', 'icon' => 'file-text', 'items' => [
            ['label' => 'Type', 'url' => ['/content/type/index']],
            ['label' => 'Page', 'url' => ['/content/page/index']],
        ]]];
    }
}