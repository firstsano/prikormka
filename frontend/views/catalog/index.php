<?php

/* @var $this \yii\web\View */
/* @var $sortOptions array */
/* @var $paginationOptions array */

use frontend\components\widgets\DataDisplaySetter;

$this->title = Yii::t('frontend/site', 'All products');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="catalog-index">
    <h1 class="catalog-index__title"><?= $this->title ?></h1>
    <div class="catalog-index__body">
        <?= DataDisplaySetter::widget([
            'options' => [
                'sort' => [
                    'options' => $sortOptions
                ],
                'pagination' => [
                    'options' => $paginationOptions
                ]
            ]
        ]) ?>
    </div>
</div>
