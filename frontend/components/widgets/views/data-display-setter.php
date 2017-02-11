<?php

/* @var $this \yii\web\View */
/* @var $sortOptions array */
/* @var $paginationOptions array */

use frontend\components\extensions\Html;
use frontend\components\widgets\Selector;

Html::addCssClass($sortOptions['htmlOptions'], 'data-display-setter__sorting-select');


?>

<div class="data-display-setter">
    <?= Html::beginForm() ?>
    <div class="data-display-setter__sorting">
        <span class="data-display-setter__label"> Сортировка </span>
        <?= Selector::widget([
            'options' => [
                'input' => [
                    'name' => $sortOptions['name'],
                    'selected' => $sortOptions['selected'],
                    'options' => $sortOptions['options'],
                ],
                'html' => $sortOptions['htmlOptions']
            ]
        ]) ?>
    </div>
    <div class="data-display-setter__pagination">
        <span class="data-display-setter__label"> Показать на странице </span>
        <?= Selector::widget([
            'options' => [
                'input' => [
                    'name' => $paginationOptions['name'],
                    'selected' => $paginationOptions['selected'],
                    'options' => $paginationOptions['options'],
                ],
                'html' => $paginationOptions['htmlOptions']
            ]
        ]) ?>
    </div>
    <?= Html::endForm() ?>
</div>
