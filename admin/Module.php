<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 9/17/18
 * Time: 4:21 PM
 */

namespace pantera\content\admin;

use pantera\content\models\ContentType;
use Yii;

class Module extends \yii\base\Module
{
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
        ModuleAsset::register(Yii::$app->view);
    }

    public function getMenuItems()
    {
        $currentModule = Yii::$app->controller->module->id == 'content';
        $controllerId = Yii::$app->controller->id;
        $items = [
            ['label' => Yii::t('content', 'Type'), 'url' => ['/content/type/index'], 'active' => $currentModule && $controllerId == 'type'],
            ['label' => Yii::t('content', 'Slider'), 'url' => ['/content/slider/index'], 'active' => $currentModule && $controllerId == 'slider'],
            ['label' => Yii::t('content', 'Block'), 'url' => ['/content/block/index'], 'active' => $currentModule && $controllerId == 'block'],
        ];
        $types = ContentType::find()->all();
        foreach ($types as $type) {
            $items[] = [
                'label' => $type->name,
                'url' => ['/content/page/index', 'key' => $type->key],
                'active' => $currentModule
                         && $controllerId == 'page'
                         && Yii::$app->request->get('key') == $type->key,
            ];
        }
        return [['label' => Yii::t('content', 'Content'), 'url' => '#', 'icon' => 'file-text', 'items' => $items]];
    }
}
