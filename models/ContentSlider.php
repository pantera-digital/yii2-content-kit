<?php

namespace pantera\content\models;

use pantera\media\behaviors\MediaUploadBehavior;
use pantera\media\models\Media;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%content_slider}}".
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property int $status
 * @property string $row_1
 * @property string $row_2
 * @property string $row_3
 *
 * @property Media $media
 * @property Media $mediaSmall
 */
class ContentSlider extends ActiveRecord
{
    /* @var int Активный статус */
    const STATUS_ACTIVE = 1;
    /* @var int Не активный статус */
    const STATUS_NOT_ACTIVE = 0;

    /**
     * Получить список статусов
     * @return array
     */
    public function getStatusList(): array
    {
        return [
            self::STATUS_ACTIVE => Yii::t('content', 'Published'),
            self::STATUS_NOT_ACTIVE => Yii::t('content', 'Draft'),
        ];
    }

    /**
     * Получить текуший статус
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
                'class' => MediaUploadBehavior::class,
                'buckets' => [
                    'media' => [],
                    'mediaSmall' => [],
                ],
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%content_slider}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status', 'sort'], 'integer'],
            [['title', 'url'], 'string', 'max' => 255],
            [['row_1', 'row_2', 'row_3'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Yii::t('content', 'Title'),
            'url' => Yii::t('content', 'Url'),
            'status' => Yii::t('content', 'Status'),
            'sort' => 'Позиция',
            'row_1' => Yii::t('content', 'Row 1'),
            'row_2' => Yii::t('content', 'Row 2'),
            'row_3' => Yii::t('content', 'Row 3'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ContentSliderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContentSliderQuery(get_called_class());
    }
}
