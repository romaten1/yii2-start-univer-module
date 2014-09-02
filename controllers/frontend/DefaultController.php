<?php

namespace vova07\blogs\controllers\frontend;

use romaten1\univer\models\frontend\Cafedra;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\HttpException;
use Module;

/**
 * Default controller.
 */
class DefaultController extends Controller
{
    /**
     * Cafedra list page.
     */
    function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Cafedra::find()->published(),
            'pagination' => [
                'pageSize' => $this->module->recordsPerPage
            ]
        ]);

        return $this->render(
            'index',
            [
                'dataProvider' => $dataProvider
            ]
        );
    }

    /**
     * Cafedra page.
     *
     * @param integer $id Cafedra ID
     * @param string $alias Cafedra alias
     *
     * @return mixed
     *
     * @throws \yii\web\HttpException 404 if Cafedra was not found
     */
    public function actionView($id, $alias)
    {
        if (($model = Cafedra::findOne(['id' => $id, 'alias' => $alias])) !== null) {
            return $this->render(
                'view',
                [
                    'model' => $model
                ]
            );
        } else {
            throw new HttpException(404);
        }
    }
}
