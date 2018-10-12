<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 9/18/18
 * Time: 10:57 AM
 */

namespace pantera\content\controllers;


use pantera\content\models\ContentPage;
use Yii;
use yii\base\ViewNotFoundException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use function is_null;

class ViewController extends Controller
{
    public function actionIndex($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->url !== '/' && $model->slugCompare(Yii::$app->request->url) === false) {
            return $this->redirect($model->getUrl(), 301);
        }
        Yii::$app->seo->setTitle($model->seo->title ?: $model->title);
        Yii::$app->seo->setH1($model->seo->h1 ?: $model->title);
        Yii::$app->seo->setDescription($model->seo->description);
        Yii::$app->seo->setKeywords($model->seo->keywords);
        $params = [
            'model' => $model,
        ];
        try {
            return $this->render('index--id-' . $model->id, $params);
        } catch (ViewNotFoundException $e) {
            try {
                try {
                    return $this->render('index--' . $model->slug, $params);
                } catch (ViewNotFoundException $e) {
                    return $this->render('index--type-' . $model->type->key, $params);
                }
            } catch (ViewNotFoundException $e) {
                return $this->render('index', $params);
            }
        }
    }

    protected function findModel($id): ContentPage
    {
        $model = ContentPage::find()
            ->isActive()
            ->andWhere(['=', ContentPage::tableName() . '.id', $id])
            ->one();
        if (is_null($model)) {
            throw new NotFoundHttpException();
        }
        return $model;
    }
}