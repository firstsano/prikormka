<?php

/* @var $this yii\web\View */
/* @var $main string */
/* @var $top string */
/* @var $bottom string */
/* @var $options array */

use frontend\components\extensions\Html;


echo Html::beginTag('div', $options);
echo Html::beginTag('div', $options['main']);
echo $main .
    Html::tag('div', $top, $options['top']) .
    Html::tag('div', $bottom, $options['bottom']);
echo Html::endTag('div');
echo Html::endTag('div');
