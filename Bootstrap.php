<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 9/19/18
 * Time: 5:15 PM
 */

namespace pantera\content;

use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\i18n\PhpMessageSource;
use yii\swiftmailer\Mailer;

class Bootstrap implements BootstrapInterface
{

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     * @throws \yii\base\InvalidConfigException
     */
    public function bootstrap($app)
    {
        if (!isset($app->get('i18n')->translations['content'])) {
            $app->get('i18n')->translations['content'] = [
                'class' => PhpMessageSource::class,
                'basePath' => __DIR__ . '/admin/messages',
                'sourceLanguage' => 'en-US'
            ];
        }
    }
}
