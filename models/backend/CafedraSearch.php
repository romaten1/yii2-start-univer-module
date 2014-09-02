<?php

namespace romaten1\univer\models\backend;

use yii\data\ActiveDataProvider;

/**
 * Blog search model.
 */
class CafedraSearch extends Cafedra
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // Integer
            ['id', 'integer'],
            // String
            [['description'], 'string'],
            [['title', 'title_en'], 'string', 'max' => 255],
            // Status
            ['active', 'in', 'range' => array_keys(self::getStatusArray())]
        ];
    }

    /**
     * Creates data provider instance with search query applied.
     *
     * @param array $params Search params
     *
     * @return ActiveDataProvider DataProvider
     */
    public function search($params)
    {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(
            [
                'id' => $this->id,
                'active' => $this->active
            ]
        );

        $query->andFilterWhere(['like', 'title_en', $this->alias]);
        $query->andFilterWhere(['like', 'title', $this->title]);
        $query->andFilterWhere(['like', 'description', $this->snippet]);

        return $dataProvider;
    }
}
