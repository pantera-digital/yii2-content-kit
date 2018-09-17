# yii2-content-kit

Модуль для управления контентом сайта: страницы, блоки, меню

Модуль зависит от `pantera-digital/yii2-media` и `pantera-digital/yii2-seo`, подробнее о них можно узнать здесь:

https://packagist.org/packages/pantera-digital/yii2-media

https://packagist.org/packages/pantera-digital/yii2-seo


### Установка модуля

Выполните команду composer:
```
composer require pantera-digital/yii2-content-kit
```
Или добавьте в composer.json
```
"pantera-digital/yii2-content-kit": "@dev"
```
и выполните команду
```
composer update
```

### Запустить миграции

```
php yii migrate --migrationPath=vendor/pantera-digital/yii2-content-kit/migrations
```

или добавить в конфиг консоли
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
и выполнить
```
php yii migrate
```

### Сконфигурировать модули frontend и backend

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
