<?php

namespace pantera\content\models;

/**
 * This is the model class for table "{{%content_block}}".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $wysiwyg
 * @property int $status
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
            [['wysiwyg', 'status'], 'integer'],
            [['title'], 'string', 'max' => 255],
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
            'wysiwyg' => 'Wysiwyg',
            'status' => 'Status',
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
