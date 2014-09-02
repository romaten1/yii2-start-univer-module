<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii2_start_prepod".
 *
 * @property integer $id
 * @property integer $cafedra_id
 * @property string $name
 * @property string $second_name
 * @property string $surname
 * @property string $name_en
 * @property string $description
 * @property string $image_id
 * @property integer $job_id
 * @property integer $job_org_id
 * @property integer $science_status_id
 * @property integer $active
 * @property integer $visited
 */
class Prepod extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%prepod}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cafedra_id', 'name', 'second_name', 'surname', 'name_en', 'description', 'image_id'], 'required'],
            [['cafedra_id', 'job_id', 'job_org_id', 'science_status_id', 'active', 'visited'], 'integer'],
            [['description'], 'string'],
            [['name', 'second_name', 'surname', 'name_en'], 'string', 'max' => 100],
            [['image_id'], 'string', 'max' => 255]
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
            'name' => Yii::t('app', 'Name'),
            'second_name' => Yii::t('app', 'Second Name'),
            'surname' => Yii::t('app', 'Surname'),
            'name_en' => Yii::t('app', 'Name En'),
            'description' => Yii::t('app', 'Description'),
            'image_id' => Yii::t('app', 'Image ID'),
            'job_id' => Yii::t('app', 'Job ID'),
            'job_org_id' => Yii::t('app', 'Job Org ID'),
            'science_status_id' => Yii::t('app', 'Science Status ID'),
            'active' => Yii::t('app', 'Active'),
            'visited' => Yii::t('app', 'Visited'),
        ];
    }
}
