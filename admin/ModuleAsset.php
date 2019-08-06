<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 9/18/18
 * Time: 2:28 PM
 */

namespace pantera\content\admin;


use yii\web\AssetBundle;

class ModuleAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/assets';

    public $js = [
        'pantera-content-kit.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
