<?php

namespace pantera\content\models;

use Yii;

/**
 * This is the model class for table "{{%content_banner}}".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $status
 * @property string $position
 * @property string $available_url
 * @property string $editor
 */
class ContentBlock extends \yii\db\ActiveRecord
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

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%content_block}}';
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
            [['title', 'position', 'available_url'], 'string', 'max' => 255],
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
            'title' => Yii::t('content', 'Title'),
            'body' => Yii::t('content', 'Body'),
            'status' => Yii::t('content', 'Status'),
            'position' => Yii::t('content', 'Position'),
            'available_url' => Yii::t('content', 'Available Url'),
            'editor' => Yii::t('content', 'Editor'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ContentBlockQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContentBlockQuery(get_called_class());
    }
}
