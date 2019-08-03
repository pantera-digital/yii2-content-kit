<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 9/17/18
 * Time: 4:21 PM
 */

namespace pantera\content\admin;

use pantera\content\models\ContentType;
use yii\helpers\Html;
use yii\base\InvalidConfigException;
use Yii;

class Module extends \yii\base\Module
{
    /* @var bool Управление блоками */
    public $useBlock = true;
    /* @var bool Управление слайдами */
    public $useSlider = true;
    /* @var bool Использовать pantera-digital/yii2-media для страниц */
    public $useMedia = true;
    /* @var bool Использовать pantera-digital/yii2-seo для страниц */
    public $useSeo = true;
    /* @var array Массив ролей которым доступна админка */
    public $permissions = ['@'];
    public $urlRules = [
        [
            'pattern' => 'content/page/file-delete',
            'route' => 'content/page/file-delete',
        ],
        [
            'pattern' => 'content/page/file-upload/<id>',
            'route' => 'content/page/file-upload',
            'defaults' => [
                'id' => null,
            ],
        ],
        [
            'pattern' => 'content/page/<key>',
            'route' => 'content/page/index',
        ],
        [
            'pattern' => 'content/page/<key>/create',
            'route' => 'content/page/create',
        ],
        [
            'pattern' => 'content/page/<key>/update/<id>',
            'route' => 'content/page/update',
        ],
        [
            'pattern' => 'content/page/<key>/view/<id>',
            'route' => 'content/page/view',
        ],
        [
            'pattern' => 'content/page/<key>/delete/<id>',
            'route' => 'content/page/delete',
        ]
    ];

    public function init()
    {
        parent::init();
        $this->testModuleConfig();
        ModuleAsset::register(Yii::$app->view);
    }

    public function getMenuItems()
    {
        $currentModule = Yii::$app->controller->module->id == 'content';
        $controllerId = Yii::$app->controller->id;
        
        $items = [];
        if ($this->useBlock) {
            $items[] = ['label' => Yii::t('content', 'Block'), 'url' => ['/content/block/index'], 'active' => $currentModule && $controllerId == 'block'];
        }
        if ($this->useSlider) {
            $items[] = ['label' => Yii::t('content', 'Slider'), 'url' => ['/content/slider/index'], 'active' => $currentModule && $controllerId == 'slider'];
        }

        foreach (ContentType::find()->all() as $type) {
            $items[] = [
                'label' => $type->name,
                'url' => ['/content/page/index', 'key' => $type->key],
                'active' => $currentModule
                         && $controllerId == 'page'
                         && Yii::$app->request->get('key') == $type->key,
            ];
        }

        $items[] = ['label' => Yii::t('content', 'Type'), 'url' => ['/content/type/index'], 'active' => $currentModule && $controllerId == 'type'];

        return [['label' => Yii::t('content', 'Content'), 'url' => '#', 'icon' => 'file-text', 'items' => $items]];
    }

    private function testModuleConfig()
    {
        if ($this->useSeo && !class_exists('\pantera\seo\Module')) {
            throw new InvalidConfigException("Не найден модуль https://github.com/pantera-digital/yii2-seo");
        }
        if ($this->useSlider && !$this->useMedia) {
            throw new InvalidConfigException("Для управления слайдами необходимо включить параметр 'useMedia'");
        }
        if (($this->useSlider || $this->useMedia) && !class_exists('\pantera\media\Module')) {
            throw new InvalidConfigException("Не найден модуль https://github.com/pantera-digital/yii2-media");
        }
    }
}
