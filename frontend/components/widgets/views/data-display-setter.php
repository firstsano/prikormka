<?php

/* @var $this \yii\web\View */
/* @var $route string */
/* @var $sortOptions array */
/* @var $paginationOptions array */

use frontend\components\extensions\Html;
use frontend\components\widgets\Selector;

Html::addCssClass($sortOptions['htmlOptions'], 'data-display-setter__sorting-select');

\frontend\components\widgets\assets\DataDisplaySetterAsset::register($this);

?>

<div class="data-display-setter">
    <?= Html::beginForm(['/site/set-data-display'], 'put') ?>
    <div class="data-display-setter__sorting">
        <?= Html::hiddenInput('route', $route) ?>
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
<!--    <div class="data-display-setter__submit">-->
<!--        --><?//= Html::submitInput('Показать', ['class' => 'button']) ?>
<!--    </div>-->
    <?= Html::endForm() ?>
</div>
