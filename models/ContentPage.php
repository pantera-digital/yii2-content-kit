<?php

namespace pantera\content\models;

use DateTime;
use pantera\media\behaviors\MediaUploadBehavior;
use pantera\media\models\Media;
use pantera\seo\behaviors\SeoFields;
use pantera\seo\behaviors\SlugBehavior;
use pantera\seo\models\Seo;
use pantera\seo\validators\SlugValidator;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "content_page".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $type_id
 * @property int $status
 * @property string $created_at
 * @property string $editor
 * @property string $is_favorite
 *
 * @property ContentType $type
 * @property Media $media
 * @property Seo $seo
 *
 * @method bool slugCompare($slug)
 */
class ContentPage extends ActiveRecord
{
    /* @var int Идентификатор активного состояния */
    const STATUS_ACTIVE = 1;
    /* @var int Идентификатор черновика */
    const STATUS_DRAFT = 0;
    const IS_FAVORITE_YES = 1;
    const IS_FAVORITE_NO = 0;
    public $slug;

    public function getFavoriteLabels(): array
    {
        return [
            self::IS_FAVORITE_YES => Yii::t('content', 'Yes'),
            self::IS_FAVORITE_NO => Yii::t('content', 'No'),
        ];
    }

    public function getFavoriteLabel(): string
    {
        return $this->getFavoriteLabels()[$this->is_favorite];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%content_page}}';
    }

    /**
     * {@inheritdoc}
     * @return ContentPageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContentPageQuery(get_called_class());
    }

    /**
     * Получить url адрес для просмотра этой записи
     * @return string
     */
    public function getUrl(): string
    {
        return '/' . $this->slug;
    }

    /**
     * Получить текуший статус записи
     * @return string
     */
    public function getCurrentStatus(): string
    {
        return $this->getStatusList()[$this->status];
    }

    /**
     * Получить список статусов
     * @return array
     */
    public function getStatusList(): array
    {
        return [
            0 => Yii::t('content', 'Draft'),
            1 => Yii::t('content', 'Published'),
        ];
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        
        if (Yii::$app->getModule('content') && Yii::$app->getModule('content')->useSeo) {
            $behaviors[] = [
                'class' => SeoFields::class,
            ];
            $behaviors[] = [
                'class' => SlugBehavior::class,
                'attribute' => 'title',
                'slugAttribute' => 'slug',
            ];
        }
        
        if (Yii::$app->getModule('content') && Yii::$app->getModule('content')->useMedia) {
            $behaviors[] = [
                'class' => MediaUploadBehavior::class,
                'buckets' => [
                    'media' => [],
                ],
            ];
        }

        return $behaviors;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $rules = [
            [['title', 'type_id'], 'required'],
            [['body'], 'string'],
            [['type_id'], 'integer'],
            [['status'], 'default', 'value' => 1],
            [['status'], 'in', 'range' => [0, 1]],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [
                ['type_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => ContentType::class,
                'targetAttribute' => ['type_id' => 'id']
            ],
            [['editor'], 'integer'],
            ['is_favorite', 'in', 'range' => [self::IS_FAVORITE_YES, self::IS_FAVORITE_NO]],
        ];

        if (Yii::$app->getModule('content') && Yii::$app->getModule('content')->useSeo) {
            $rules[] = [
                ['slug'], SlugValidator::class, 'skipOnEmpty' => false,
            ];
        }

        return $rules;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Yii::t('content', 'Title'),
            'body' => Yii::t('content', 'Body'),
            'type_id' => Yii::t('content', 'Type'),
            'status' => Yii::t('content', 'Status'),
            'created_at' => Yii::t('content', 'Created At'),
            'editor' => Yii::t('content', 'Editor'),
            'slug' => Yii::t('content', 'Slug'),
            'is_favorite' => Yii::t('content', 'Favorite'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(ContentType::class, ['id' => 'type_id']);
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->setCreatedAt();
        }
        return parent::beforeSave($insert);
    }

    private function setCreatedAt()
    {
        if ($this->created_at) {
            $date = new DateTime($this->created_at);
            $this->created_at = $date->format('Y-m-d H:i:s');
        }
    }

    public function loadDefaultValues($skipIfSet = true)
    {
        $except = ['CURRENT_TIMESTAMP'];
        foreach (static::getTableSchema()->columns as $column) {
            if ($column->defaultValue !== null && (!$skipIfSet || $this->{$column->name} === null) && !in_array($column->defaultValue, $except)) {
                $this->{$column->name} = $column->defaultValue;
            }
        }

        return $this;
    }
}
