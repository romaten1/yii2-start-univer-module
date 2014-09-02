<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii2_start_faculty".
 *
 * @property integer $id
 * @property string $title
 * @property string $title_en
 * @property string $description
 * @property string $image_id
 * @property integer $active
 * @property integer $visited
 */
class Faculty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%faculty}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'title_en', 'description', 'image_id'], 'required'],
            [['description'], 'string'],
            [['active', 'visited'], 'integer'],
            [['title', 'title_en', 'image_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'title_en' => Yii::t('app', 'Title En'),
            'description' => Yii::t('app', 'Description'),
            'image_id' => Yii::t('app', 'Image ID'),
            'active' => Yii::t('app', 'Active'),
            'visited' => Yii::t('app', 'Visited'),
        ];
    }
}
