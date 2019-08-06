<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 9/18/18
 * Time: 2:38 PM
 */

namespace pantera\content\admin;


use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class SweetAlertAsset extends AssetBundle
{
    public $sourcePath = '@bower/sweetalert2';

    public $css = [
        'dist/sweetalert2.min.css',
    ];

    public $js = [
        'dist/sweetalert2.min.js',
    ];

    public $depends = [
        JqueryAsset::class,
    ];
}