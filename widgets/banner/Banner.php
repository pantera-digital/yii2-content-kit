<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 9/26/18
 * Time: 12:14 PM
 */

namespace pantera\content\widgets\banner;


use pantera\content\models\ContentBanner;
use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use function implode;
use const SORT_DESC;

class Banner extends Widget
{
    /* @var integer|array|null Идентификаторы конкретного банера */
    public $ids;
    /* @var string|null Позиция для которой ищем банеры */
    public $position;
    /* @var bool Флаг нужно ли проверить url адрес на доступность отображения */
    public $activatedByUrl = false;
    /* @var string Шаблон */
    public $layout = '{content}';

    public function run()
    {
        parent::run();
        $models = [];
        if ($this->ids) {
            $_models = ContentBanner::find()
                ->isActive()
                ->andWhere(['IN', ContentBanner::tableName() . '.id', $this->ids])
                ->orderBy([ContentBanner::tableName() . '.id' => SORT_DESC])
                ->all();
            $models = ArrayHelper::merge($models, $_models);
        }
        if ($this->position) {
            $_models = ContentBanner::find()
                ->isActive()
                ->andWhere(['=', ContentBanner::tableName() . '.position', $this->position])
                ->orderBy([ContentBanner::tableName() . '.id' => SORT_DESC])
                ->all();
            $models = ArrayHelper::merge($models, $_models);
        }
        $banners = [];
        foreach ($models as $key => $model) {
            if ($this->activatedByUrl) {
                $pattern = str_replace('/', '\/', $model->available_url);
                if (preg_match('/' . $pattern . '/', Yii::$app->request->getUrl()) === 0) {
                    continue;
                };
            }
            $banners[] = $this->render('index', [
                'model' => $model,
            ]);
        }
        if ($banners) {
            return strtr($this->layout, [
                '{content}' => implode('', $banners),
            ]);
        }
    }

    public function init()
    {
        parent::init();
        $this->ids = (array)$this->ids;
        if (empty($this->ids) && empty($this->position)) {
            throw new InvalidConfigException('Пожалуйста укажите позицию банера, либо идентификатор конкретного банера');
        }
    }
}