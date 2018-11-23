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
use yii\i18n\PhpMessageSource;

class Module extends \yii\base\Module
{
    /* @var array Массив ролей которым доступна админка */
    public $permissions = ['@'];

    public function init()
    {
        parent::init();
        if (!isset(Yii::$app->get('i18n')->translations['content'])) {
            Yii::$app->get('i18n')->translations['content'] = [
                'class' => PhpMessageSource::class,
                'basePath' => __DIR__ . '/messages',
                'sourceLanguage' => 'en-US'
            ];
        }
        ModuleAsset::register(Yii::$app->view);
    }

    public function getMenuItems()
    {
        $items = [
            ['label' => Yii::t('content', 'Type'), 'url' => ['/content/type/index']],
            ['label' => Yii::t('content', 'Slider'), 'url' => ['/content/slider/index']],
            ['label' => Yii::t('content', 'Block'), 'url' => ['/content/block/index']],
        ];
        $types = ContentType::find()->all();
        foreach ($types as $type) {
            $items[] = ['label' => $type->name, 'url' => ['/content/page/' . $type->key]];
        }
        return [['label' => Yii::t('content', 'Content'), 'url' => '#', 'icon' => 'file-text', 'items' => $items]];
    }
}