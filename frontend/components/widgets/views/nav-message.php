<?php

/* @var $this \yii\web\View */

use frontend\components\extensions\Html;

?>

<div class="nav-message">
    Вернуться на
    <?= Html::a('главную страницу', Yii::$app->homeUrl, [
        'class' => 'nav-message__link'
    ]) ?>
    или перейти к
    <?= Html::a('оптовому каталогу', ['/wholesale-catalog/index'], [
        'class' => 'nav-message__link'
    ]) ?>
</div>
