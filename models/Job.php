<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii2_start_job".
 *
 * @property integer $id
 * @property string $title
 * @property string $title_en
 * @property integer $type
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%job}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'title_en'], 'required'],
            [['type'], 'integer'],
            [['title', 'title_en'], 'string', 'max' => 255]
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
            'type' => Yii::t('app', 'Type'),
        ];
    }
}
