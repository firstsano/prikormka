<?php

/* @var $this \yii\web\View */
/* @var $value string */
/* @var $container string */

use frontend\components\extensions\Html;

\frontend\components\widgets\assets\RemoteSearchAsset::register($this);

echo Html::beginForm('', 'post', [
    'data-pjax' => 1
]);
echo Html::textInput('filter', $value, [
    'class' => 'search',
    'placeholder' => 'Поиск...',
]);
echo Html::endForm();