<?php

namespace romaten1\univer\models;

use vova07\users\traits\ModuleTrait;
use yii\db\ActiveQuery;
use romaten1\univer\Module;
use romaten1\univer\models\Cafedra;
/**
 * Class CafedraQuery
 * @package romaten1\univer\model
 */
class CafedraQuery extends ActiveQuery
{
    use ModuleTrait;

    /**
     * Select published posts.
     *
     * @return $this
     */
    public function published()
    {
        $this->andWhere(['active' => Cafedra::STATUS_PUBLISHED]);

        return $this;
    }

    /**
     * Select unpublished posts.
     *
     * @return $this
     */
    public function unpublished()
    {
        $this->andWhere(['active' => Cafedra::STATUS_UNPUBLISHED]);

        return $this;
    }
}
