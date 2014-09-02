<?php

namespace romaten1\univer\models\backend;

use romaten1\univer\Module;
use Yii;

/**
 * Class Cafedra
 * @package romaten1\univer\models\backend
 * Univer model.
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
class Cafedra extends \romaten1\univer\models\Cafedra
{
    /**
     * @return string Readable cafedra status
     */
    public function getStatus()
    {
        $statuses = self::getStatusArray();

        return $statuses[$this->active];
    }

    /**
     * @return array Status array.
     */
    public static function getStatusArray()
    {
        return [
            self::STATUS_UNPUBLISHED => Module::t('univer', 'STATUS_UNPUBLISHED'),
            self::STATUS_PUBLISHED => Module::t('univer', 'STATUS_PUBLISHED')
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['active', 'in', 'range' => array_keys(self::getStatusArray())];

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['admin-create'] = [
            'faculty_id',
            'title',
            'title_en',
            'description',
            'image_id',
            'active',
            'visited'
        ];
        $scenarios['admin-update'] = [
            'faculty_id',
            'title',
            'title_en',
            'description',
            'image_id',
            'active',
            'visited'
        ];

        return $scenarios;
    }
}
