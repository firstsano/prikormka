<?php

/* @var $this yii\web\View */

use frontend\components\extensions\Html;

$this->title = Yii::t('frontend/site', 'About');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-about">
    <h1 class="site-about__title"><?= Html::encode($this->title) ?></h1>
</div>
