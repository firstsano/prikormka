<?php

/* @var $this \yii\web\View */
/* @var $newsItem \common\models\Article */
/* @var $options array */

use frontend\components\widgets\Trinity;
use frontend\components\extensions\Html;
use yii\helpers\StringHelper;

?>

<div class="news-preview">
    <?= Trinity::widget([
        'main' => format_d($newsItem->published_at),
        'top' => '',
        'bottom' => format_d($newsItem->published_at, 'long'),
        'options' => [
            'class' => 'news-preview__date',
            'top' => ['class' => 'news-preview__aside-date'],
            'bottom' => ['class' => 'news-preview__aside-date']
        ]
    ]) ?>
    <article class="news-preview__layout">
        <?= Html::tag('header', $newsItem->title, ['class' => 'news-preview__title']) ?>
        <?= Html::tag('div',
            StringHelper::truncate(
                $newsItem->body,
                $options['length'],
                $options['suffix'],
                null,
                true
            ), ['class' => 'news-preview__body']) ?>
    </article>
</div>
