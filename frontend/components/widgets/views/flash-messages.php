<?php

/* @var $this \yii\web\View */
/* @var $messages array */

use yii\helpers\ArrayHelper;
use frontend\components\extensions\Html;

foreach ($messages as $message) {
    $type = ArrayHelper::getValue($message, 'type', 'info');
    $title = ArrayHelper::getValue($message, 'title');
    $messageBody = ArrayHelper::getValue($message, 'message');

    echo Html::beginTag('div', ['class' => "flash-message flash-message_$type"]);
    echo Html::tag('div', $title, ['class' => 'flash-message__title']);
    echo Html::tag('div', $messageBody, ['class' => 'flash-message__body']);
    echo Html::endTag('div');
}