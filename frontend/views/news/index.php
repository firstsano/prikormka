<?php

/* @var $this \yii\web\View */
/* @var $news \common\models\Article[] */

use frontend\components\extensions\Html;

$this->title = Yii::t('frontend/site', 'Blog');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="news-index">
    <h1 class="news-index__title"><?= $this->title ?></h1>
</div>
