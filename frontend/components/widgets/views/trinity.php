<?php

/* @var $this yii\web\View */
/* @var $main string */
/* @var $top string */
/* @var $bottom string */
/* @var $options array */

use frontend\components\extensions\Html;

echo Html::beginTag('div', $options);
echo Html::tag('div', $main, $options['main']);
echo Html::tag('div', $top, $options['top']);
echo Html::tag('div', $bottom, $options['bottom']);
echo Html::endTag('div');
