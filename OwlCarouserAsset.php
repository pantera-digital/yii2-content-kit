<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 9/26/18
 * Time: 11:15 AM
 */

namespace pantera\content;


use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class OwlCarouserAsset extends AssetBundle
{
    public $sourcePath = '@bower/owl.carousel/dist';

    public $css = [
        'assets/owl.carouser.min.css'
    ];

    public $js = [
        'owl.carouser.min.js'
    ];

    public $depends = [
        JqueryAsset::class,
    ];
}