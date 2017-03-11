<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\Article */

use frontend\components\extensions\Breadcrumbs;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend/site', 'Blog'), 'url' => ['/news/index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs-printed'] = true;

?>

<div class="news-view">
    <div class="news-view__title-background" style="background-image: url(<?= $model->imageUrl ?>);">
        <div class="news-view__breadcrumbs-layout">
            <div class="news-view__breadcrumbs">
                <?= Breadcrumbs::widget([
                    'links' => $this->params['breadcrumbs'],
                    'options' => ['class' => 'breadcrumbs breadcrumbs_inner'],
                ]) ?>
            </div>
        </div>
        <div class="news-view__title-layout">
            <div class="news-view__title"> <?= $model->title ?> </div>
        </div>
    </div>
    <div class="news-view__layout">
        <div class="news-view__info">
            <div class="news-view__published"> <?= format_d($model->published_at, 'long') ?> </div>
        </div>
        <hr />
        <div class="news-view__body">
            <?= $model->body ?>
        </div>
    </div>
</div>
