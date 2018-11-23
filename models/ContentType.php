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
        ];
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
