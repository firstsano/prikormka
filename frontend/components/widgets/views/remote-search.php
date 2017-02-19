<?php

/* @var $this \yii\web\View */
/* @var $value string */
/* @var $container string */

use frontend\components\extensions\Html;

\frontend\components\widgets\assets\RemoteSearchAsset::register($this);

echo Html::beginForm('');
echo Html::textInput('filter', $value, [
    'class' => 'search',
    'placeholder' => 'Поиск...',
    'data' => ['container' => $container]
]);
echo Html::endForm();