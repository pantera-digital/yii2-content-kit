# yii2-content-kit

Модуль для управления контентом сайта: страницы, блоки, меню

Модуль зависит от `pantera-digital/yii2-media` и `pantera-digital/yii2-seo`, подробнее о них можно узнать здесь:

https://github.com/pantera-digital/yii2-media

https://github.com/pantera-digital/yii2-seo


### Установка модуля

Установить и настроить модуль https://github.com/MihailDev/yii2-elfinder

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
### Настроить модуль Media 
https://github.com/pantera-digital/yii2-media - здесь описание настройки

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

### Конфигурация frontend приложения

Добавить UrlManager в rules приложения
```
'urlManager' => [
    'rules' => [
        [
            'class' => pantera\content\components\UrlManager::class,
        ],
    ],
],
```

### Переопределение вью страницы
в конфиг приложения добавить
```
'components' => [
    'view' => [
        'class' => 'yii\web\View',
        'theme' => [
            'pathMap' => [
                '@pantera/content/views/view' => '@frontend/views/content/view',
            ],
        ],
    ],
],
```

Новый файл должен называть index--id-{id}, index--{slug} или index--type-{type}
* -id идентификатор записи
* -slug актуальный алиас записи
* -type ключ типа

### Виджеты
#### Slider
```
<?= pantera\content\widgets\slider\Slider::widget() ?>
```
Параметры
* $pluginOptions - Настройка плагина карусели https://owlcarousel2.github.io/OwlCarousel2/docs/api-options.html
* $options - Массив параметров для контейнера
#### Block
```
<?= \pantera\content\widgets\block\Block::widget([
    'position' => 'left',
]) ?>
```
Параметры
* $position - Позиция
* $ids - Идентификатор или набор идентификаторов
* $activatedByUrl - Флаг что нужно активировать проверку по url
* $layout - Шаблон обертка над блоками
