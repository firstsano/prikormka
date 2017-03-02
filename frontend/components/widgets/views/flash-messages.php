<?php

/* @var $this \yii\web\View */
/* @var $messages array */
/* @var $options array */

use yii\helpers\ArrayHelper;
use frontend\components\extensions\Html;

foreach ($messages as $message) {
    $type = ArrayHelper::getValue($message, 'type', 'info');
    $title = ArrayHelper::getValue($message, 'title');
    $messageBody = ArrayHelper::getValue($message, 'message');

    Html::addCssClass($options, ["flash-message", "flash-message_$type"]);

    echo Html::beginTag('div', $options);
    echo Html::tag('div', $title, ['class' => 'flash-message__title']);
    echo Html::tag('div', $messageBody, ['class' => 'flash-message__body']);
    echo Html::endTag('div');
}