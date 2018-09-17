# yii2-content-kit

## Установка

```
composer require pantera-digital/yii2-content-kit
```

Для начала нужно сконфигурировать
https://packagist.org/packages/pantera-digital/yii2-seo
https://packagist.org/packages/pantera-digital/yii2-media

Добавить к конфиг консоли
```
'controllerMap' => [
    'migrate' => [
        'class' => yii\console\controllers\MigrateController::className(),
        'migrationPath' => [
            '@pantera/content/migrations',
        ],
    ],
],
```
Добавить в конфиг frontend приложения
```
    'content' => [
        'class' => \pantera\content\Module::className(),
    ],
```
Добавить в конфиг backend приложения
```
    'content' => [
        'class' => \pantera\content\admin\Module::className(),
        'permissions' => ['admin'],
    ],
```
Выполнить в консоли
```
php yii migrate
```