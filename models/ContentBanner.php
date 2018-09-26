<?php

namespace pantera\content\models;

/**
 * This is the model class for table "{{%content_banner}}".
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string $body
 * @property int $status
 * @property string $position
 * @property string $available_url
 */
class ContentBanner extends \yii\db\ActiveRecord
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

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%content_banner}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['body'], 'string'],
            [['status'], 'integer'],
            [['title', 'url', 'position', 'available_url'], 'string', 'max' => 255],
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
            'body' => 'Body',
            'status' => 'Status',
            'position' => 'Position',
            'available_url' => 'Available Url',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ContentBannerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContentBannerQuery(get_called_class());
    }
}
