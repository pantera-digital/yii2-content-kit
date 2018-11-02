<?php

namespace pantera\content\models;

use pantera\media\behaviors\MediaUploadBehavior;
use pantera\media\models\Media;
use pantera\seo\behaviors\SeoFields;
use pantera\seo\behaviors\SlugBehavior;
use pantera\seo\models\Seo;
use pantera\seo\validators\SlugValidator;

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
 *
 * @property ContentType $type
 * @property Media $media
 * @property Seo $seo
 *
 * @method bool slugCompare($slug)
 */
class ContentPage extends \yii\db\ActiveRecord
{
    public $slug;

    /* @var int Идентификатор активного состояния */
    const STATUS_ACTIVE = 1;
    /* @var int Идентификатор черновика */
    const STATUS_DRAFT = 0;

    /**
     * Получить url адрес для просмотра этой записи
     * @return string
     */
    public function getUrl(): string
    {
        return '/' . $this->slug;
    }

    /**
     * Получить список статусов
     * @return array
     */
    public function getStatusList(): array
    {
        return [
            0 => 'Черновик',
            1 => 'Опубликовано',
        ];
    }

    /**
     * Получить текуший статус записи
     * @return string
     */
    public function getCurrentStatus(): string
    {
        return $this->getStatusList()[$this->status];
    }

    public function behaviors()
    {
        return [
            [
                'class' => SeoFields::className(),
            ],
            [
                'class' => MediaUploadBehavior::className(),
                'buckets' => [
                    'media' => [],
                ],
            ],
            [
                'class' => SlugBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'slug',
            ],
        ];
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
     */
    public function rules()
    {
        return [
            [['title', 'type_id'], 'required'],
            [['body'], 'string'],
            [['type_id'], 'integer'],
            [['status'], 'default', 'value' => 1],
            [['status'], 'in', 'range' => [0, 1]],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ContentType::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['slug'], SlugValidator::className(), 'skipOnEmpty' => false],
            [['editor'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'type_id' => 'Type',
            'status' => 'Status',
            'created_at' => 'Created At',
            'editor' => 'Editor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(ContentType::className(), ['id' => 'type_id']);
    }

    /**
     * {@inheritdoc}
     * @return ContentPageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContentPageQuery(get_called_class());
    }
}
