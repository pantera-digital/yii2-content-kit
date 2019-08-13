<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 9/17/18
 * Time: 4:21 PM
 */

namespace pantera\content;

class Module extends \yii\base\Module
{
    const SLUG_FRONT_PAGE = '<front>';
    
    /* @var bool Управление блоками */
    public $useBlock = true;
    /* @var bool Управление слайдами */
    public $useSlider = true;
    /* @var bool Использовать pantera-digital/yii2-media для страниц */
    public $useMedia = true;
    /* @var bool Использовать pantera-digital/yii2-seo для страниц */
    public $useSeo = true;
}
