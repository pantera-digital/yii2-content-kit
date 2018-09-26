<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 9/26/18
 * Time: 11:26 AM
 */

namespace pantera\content\widgets\slider;


use pantera\content\OwlCarouserAsset;
use yii\web\AssetBundle;

class SliderAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/assets';

    public $js = [
        'js/script.js',
    ];

    public $depends = [
        OwlCarouserAsset::class,
    ];
}