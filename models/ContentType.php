<?php

namespace pantera\content\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "content_type".
 *
 * @property int $id
 * @property string $name
 * @property string $key
 *
 * @property ContentPage[] $pages
 */
class ContentType extends \yii\db\ActiveRecord
{
    const IS_AVAILABLE_FULL_PAGE_YES = 1;
    const IS_AVAILABLE_FULL_PAGE_NO = 0;

    /**
     * Получить список типов
     * @return array
     */
    public static function getList(): array
    {
        $models = self::find()
            ->all();
        return ArrayHelper::map($models, 'id', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%content_type}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'key'], 'required'],
            [['name', 'key'], 'string', 'max' => 255],
            [['key'], 'match', 'pattern' => '/^[0-9A-Za-z-]*$/'],
            [['key'], 'trim'],
            [['key'], 'unique'],
            ['is_available_full_page', 'in', 'range' => [self::IS_AVAILABLE_FULL_PAGE_YES, self::IS_AVAILABLE_FULL_PAGE_NO]],
        ];
    }

    public function getIsAvailableFullPageLabels(): array
    {
        return [
            self::IS_AVAILABLE_FULL_PAGE_YES => Yii::t('content', 'Yes'),
            self::IS_AVAILABLE_FULL_PAGE_NO => Yii::t('content', 'No'),
        ];
    }

    public function getIsAvailableFullPageLabel(): string
    {
        return $this->getIsAvailableFullPageLabels()[$this->is_available_full_page];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('content', 'Name'),
            'key' => Yii::t('content', 'Key'),
            'is_available_full_page' => Yii::t('content', 'Is available full page'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(ContentPage::className(), ['type_id' => 'id']);
    }
}
