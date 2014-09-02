<?php

namespace romaten1\univer\models;

use Yii;
use vova07\behaviors\PurifierBehavior;
use vova07\fileapi\behaviors\UploadBehavior;
use romaten1\univer\Module;
use romaten1\univer\models\query\CafedraQuery;
use romaten1\univer\traits\ModuleTrait;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "yii2_start_cafedra".
 *
 * @property integer $id
 * @property integer $faculty_id
 * @property string $title
 * @property string $title_en
 * @property string $description
 * @property string $image_id
 * @property integer $active
 * @property integer $visited
 */
class Cafedra extends \yii\db\ActiveRecord
{
    use ModuleTrait;

    /** Unpublished status **/
    const STATUS_UNPUBLISHED = 0;
    /** Published status **/
    const STATUS_PUBLISHED = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cafedra}}';
    }

    /**
     * @inheritdoc
     */
    public static function find()
    {
        return new CafedraQuery(get_called_class());
    }

    public function behaviors()
    {
        return [
            'timestampBehavior' => [
                'class' => TimestampBehavior::className(),
            ],
            'sluggableBehavior' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'title_en'
            ],
            'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    /*'preview_url' => [
                        'path' => $this->module->previewPath.'/cafedra',
                        'tempPath' => $this->module->imagesTempPath.'/cafedra',
                        'url' => $this->module->previewUrl.'/cafedra'
                    ],*/
                    'image_id' => [
                        'path' => $this->module->imagePath.'/cafedra',
                        'tempPath' => $this->module->imagesTempPath.'/cafedra',
                        'url' => $this->module->imageUrl.'/cafedra'
                    ]
                ]
            ],
            'purifierBehavior' => [
                'class' => PurifierBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_VALIDATE => [
                        'description',
                    ]
                ],
                'textAttributes' => [
                    self::EVENT_BEFORE_VALIDATE => ['title', 'title_en']
                ]
            ]
        ];
    }    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['faculty_id', 'title', 'description', 'image_id'], 'required'],
            [['faculty_id', 'active', 'visited'], 'integer'],
            // Trim
            [['title', 'description'], 'trim'],
            [['description'], 'string'],
            [['title', 'title_en', 'image_id'], 'string', 'max' => 255],
            // Status
            [
                'active',
                'default',
                'value' => $this->module->moderation ? self::STATUS_PUBLISHED : self::STATUS_UNPUBLISHED
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('univer', 'ATTR_ID'),
            'faculty_id' => Module::t('univer', 'ATTR_FACULTY_ID'),
            'title' => Module::t('univer', 'ATTR_TITLE'),
            'title_en' => Module::t('univer', 'ATTR_TITLE_EN'),
            'description' => Module::t('univer', 'ATTR_DESCRIPTION'),
            'image_id' => Module::t('univer', 'ATTR_IMAGE_ID'),
            'active' => Module::t('univer', 'ATTR_ACTIVE'),
            'visited' => Module::t('univer', 'ATTR_VISITED'),
        ];
    }
}
