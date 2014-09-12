<?php

/**
 * Cafedra list item view.
 *
 * @var \yii\web\View $this View
 * @var \romaten1\univer\models\frontend\Blog $model Model
 */

use romaten1\univer\Module;
use yii\helpers\Html;

?>
<?php if ($model->image_id) : ?>
    <?= Html::a(
        Html::img(
            $model->urlAttribute('image_id'),
            ['class' => 'img-responsive img-blog', 'width' => '100%', 'alt' => $model->title]
        ),
        ['view', 'id' => $model->id, 'alias' => $model->title_en]
    ) ?>
<?php endif; ?>

<div class="cafedra-content">
    <h3>
        <?= Html::a($model->title, ['view', 'id' => $model->id, 'alias' => $model->title_en]) ?>
    </h3>

    
    <?= $model->description; ?>
    <?= Html::a(
        Module::t('univer', 'FRONTEND_INDEX_READ_MORE_BTN') . ' <i class="icon-angle-right"></i>',
        ['view', 'id' => $model->id, 'alias' => $model->title_en],
        ['class' => 'btn btn-default']
    ) ?>
</div>