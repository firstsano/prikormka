<?php

/* @var $this \yii\web\View */
/* @var $news \common\models\Article[] */

use frontend\components\extensions\Html;

$this->title = Yii::t('frontend/site', 'Blog');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="news-index">
    <h1 class="news-index__title"><?= $this->title ?></h1>
    <? foreach ($news as $newsItem): ?>
        <hr />
        <div class="news-index__item">
            <div class="news-index__item-thumbnail">
                <?= Html::img($newsItem->imageUrl, [
                    'alt' => $newsItem->title,
                    'class' => 'img-responsive'
                ]) ?>
            </div>
            <div class="news-index__item-description">
                <?= Html::a($newsItem->title, ['/news/view', 'id' => $newsItem->id], [
                    'class' => 'news-index__item-title'
                ]) ?>
                <div class="news-index__item-publish">
                    <?= format_d($newsItem->published_at, 'long') ?>
                </div>
            </div>
        </div>
    <? endforeach; ?>
    <hr />
</div>
