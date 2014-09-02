<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii2_start_subject".
 *
 * @property integer $id
 * @property integer $cafedra_id
 * @property string $title
 * @property string $title_en
 * @property integer $active
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%subject}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cafedra_id', 'title', 'title_en'], 'required'],
            [['cafedra_id', 'active'], 'integer'],
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
            'cafedra_id' => Yii::t('app', 'Cafedra ID'),
            'title' => Yii::t('app', 'Title'),
            'title_en' => Yii::t('app', 'Title En'),
            'active' => Yii::t('app', 'Active'),
        ];
    }
}
