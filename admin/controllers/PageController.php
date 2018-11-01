<?php

namespace pantera\content\admin\controllers;

use pantera\content\admin\models\ContentPageSearch;
use pantera\content\admin\Module;
use pantera\content\models\ContentPage;
use pantera\content\models\ContentType;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use function is_null;

/**
 * PageController implements the CRUD actions for ContentPage model.
 */
class PageController extends Controller
{
    /* @var Module */
    public $module;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => $this->module->permissions,
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'file-upload' => [
                'class' => \pantera\media\actions\kartik\MediaUploadActionKartik::className(),
                'model' => function () {
                    if (Yii::$app->request->get('id')) {
                        return $this->findModel(Yii::$app->request->get('id'));
                    } else {
                        return new ContentPage();
                    }
                }
            ],
            'file-delete' => [
                'class' => \pantera\media\actions\kartik\MediaDeleteActionKartik::className(),
                'model' => function () {
                    return \pantera\media\models\Media::findOne(Yii::$app->request->post('id'));
                }
            ],
        ];
    }

    /**
     * Lists all ContentPage models.
     * @param $key
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionIndex($key)
    {
        $typeModel = $this->findTypeModel($key);
        $searchModel = new ContentPageSearch();
        $searchModel->type_id = $typeModel->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ContentPage model.
     * @param $key
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($key, $id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ContentPage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param $key
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionCreate($key)
    {
        $type = $this->findTypeModel($key);
        $model = new ContentPage();
        $model->loadDefaultValues();
        $model->type_id = $type->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'key' => $model->type->key, 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ContentPage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param $key
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($key, $id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'key' => $model->type->key, 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ContentPage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param $key
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($key, $id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index', 'key' => $key]);
    }

    /**
     * Finds the ContentPage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ContentPage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ContentPage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findTypeModel($key)
    {
        $model = ContentType::find()
            ->andWhere(['=', ContentType::tableName() . '.key', $key])
            ->one();
        if (is_null($model)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return $model;
    }
}
