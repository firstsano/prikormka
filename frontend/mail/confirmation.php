<?php

/**
 * @var $this \yii\web\View
 * @var $url \common\models\User
 */

use frontend\components\extensions\Html;

echo Yii::t('frontend/site', 'Your confirmation link')
    . ":"
    . Html::tag('br')
    . Yii::$app->formatter->asUrl($url)
;
