<?php

/**
 * @var \yii\base\View $this View
 * @var \yii\data\ActiveDataProvider $dataProvider Data provider
 * @var \romaten1\univer\models\backend\CafedraSearch $searchModel Search model
 * @var array $statusArray Statuses array
 */

use backend\themes\admin\widgets\Box;
use backend\themes\admin\widgets\GridView;
use romaten1\univer\Module;
use yii\grid\ActionColumn;
use yii\grid\CheckboxColumn;
use yii\helpers\Html;
use yii\jui\DatePicker;

$this->title = Module::t('univer', 'BACKEND_INDEX_TITLE');
$this->params['subtitle'] = Module::t('univer', 'BACKEND_INDEX_SUBTITLE');
$this->params['breadcrumbs'] = [
    $this->title
]; ?>

<div class="row">
    <div class="col-xs-12">
        <?php Box::begin(
            [
                'title' => $this->params['subtitle'],
                'bodyOptions' => [
                    'class' => 'table-responsive'
                ],
                'buttonsTemplate' => '{create} {batch-delete}',
                'grid' => 'univer-grid'
            ]
        ); ?>
        <?= GridView::widget(
            [
                'id' => 'univer-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'class' => CheckboxColumn::classname()
                    ],
                    'id',
                    [
                        'attribute' => 'title',
                        'format' => 'html',
                        'value' => function ($model) {
                                return Html::a(
                                    $model['title'],
                                    ['update', 'id' => $model['id']]
                                );
                            }
                    ],
                    'views',
                    [
                        'attribute' => 'active',
                        'format' => 'html',
                        'value' => function ($model) {
                                $class = ($model->active === $model::STATUS_PUBLISHED) ? 'label-success' : 'label-danger';

                                return '<span class="label ' . $class . '">' . $model->active . '</span>';
                            },
                        'filter' => Html::activeDropDownList(
                                $searchModel,
                                'active',
                                $statusArray,
                                [
                                    'class' => 'form-control',
                                    'prompt' => Module::t('univer', 'BACKEND_PROMPT_STATUS')
                                ]
                            )
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'template' => '{update} {delete}'
                    ]
                ]
            ]
        ); ?>
        <?php Box::end(); ?>
    </div>
</div>