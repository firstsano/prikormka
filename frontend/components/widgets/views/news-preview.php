<?php

/* @var $this \yii\web\View */

use frontend\components\widgets\Trinity;

?>

<div class="news-preview">
    <?= Trinity::widget(['main' => '08.12', 'top' => 'москва', 'bottom' => '08 декабря 2016г',
        'options' => ['class' => 'news-preview__date']]) ?>
    <article class="news-preview__layout">
        <header class="news-preview__title"> Конкурс на лучший отчет о рыбалке </header>
        <div class="news-preview__body">
            Рады сообщить вам о том, что теперь каждый день мы
            проводим конкурс на лучший отчет о рыбалке,
            вы долджны предоставить фото, паспортные данные,
            и рассказ о том, как вы провели лучшую вашу рыбалку.
            Работы принимаются до ...
        </div>
    </article>
</div>
