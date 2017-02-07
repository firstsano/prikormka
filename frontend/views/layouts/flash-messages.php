<?php

/* @var $this \yii\web\View */

use kartik\growl\Growl;
use yii\helpers\ArrayHelper;

//Get all flash messages and loop through them
foreach (Yii::$app->session->allFlashes as $message) {
    echo Growl::widget([
        'type' => ArrayHelper::getValue($message, 'type', 'danger'),
        'title' => @$message['title'],
        'icon' => ArrayHelper::getValue($message, 'icon', 'glyphicon glyphicon-info-sign'),
        'body' => @$message['message'],
        'showSeparator' => true,
        'delay' => ArrayHelper::getValue($message, 'delay', 1),
        'pluginOptions' => [
            'showProgressbar' => ArrayHelper::getValue($message, 'progressBar', true),
            'delay' => ArrayHelper::getValue($message, 'duration', 3000),
            'placement' => [
                'from' => ArrayHelper::getValue($message, 'positonY', 'top'),
                'align' => ArrayHelper::getValue($message, 'positonX', 'right'),
            ]
        ]
    ]);
}