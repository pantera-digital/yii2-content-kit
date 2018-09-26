<?php

namespace pantera\content\models;

use pantera\media\behaviors\MediaUploadBehavior;
use pantera\media\models\Media;

/**
 * This is the model class for table "{{%content_slider}}".
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property int $status
 *
 * @property Media $media
 */
class ContentSlider extends \yii\db\ActiveRecord
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
            self::STATUS_ACTIVE => 'Опубликован',
            self::STATUS_NOT_ACTIVE => 'Черновик',
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
            [['status'], 'integer'],
            [['title', 'url'], 'string', 'max' => 255],
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
            'url' => 'Url',
            'status' => 'Status',
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
