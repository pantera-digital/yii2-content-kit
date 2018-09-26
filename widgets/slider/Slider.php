<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 9/26/18
 * Time: 11:19 AM
 */

namespace pantera\content\widgets\slider;

use pantera\content\models\ContentSlider;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

class Slider extends Widget
{
    /* @var array Массив параметров карусели */
    public $pluginOptions = [];
    /* @var array Массив параметров для контейнера */
    public $options = [];

    public function run()
    {
        parent::run();
        $models = ContentSlider::find()
            ->isActive()
            ->all();
        $this->options['id'] = $this->getId();
        Html::addCssClass($this->options, 'carousel');
        return Html::tag('div', $this->render('index', [
            'models' => $models,
        ]), $this->options);
    }

    public function init()
    {
        parent::init();
        SliderAsset::register($this->view);
        $js = 'initSlider("' . $this->getId() . '", ' . Json::encode($this->pluginOptions) . ')';
        $this->view->registerJs($js);
    }
}