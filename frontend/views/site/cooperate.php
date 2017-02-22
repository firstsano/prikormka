<?php

/* @var $this yii\web\View */

use frontend\components\extensions\Html;

$this->title = Yii::t('frontend/site', 'Cooperation');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-delivery">
    <h1 class="site-delivery__title"><?= Html::encode($this->title) ?></h1>
    <div class="site-delivery__layout">
        <div class="site-delivery__menu">
            <ul class="aside-menu">
                <li class="aside-menu__item">
                    <?= Html::a(
                        Yii::t('frontend/site', 'Delivery service'),
                        ['/site/delivery'],
                        ['class' => 'aside-menu__item-link']
                    ) ?>
                </li>
                <li class="aside-menu__item">
                    <?= Html::a(
                        Yii::t('frontend/site', 'Payment'),
                        ['/site/payment'],
                        ['class' => 'aside-menu__item-link']
                    ) ?>
                </li>
                <li class="aside-menu__item">
                    <?= Html::a(
                        $this->title,
                        '#',
                        ['class' => 'aside-menu__item-link aside-menu__item-link_active']
                    ) ?>
                </li>
            </ul>
        </div>
        <div class="site-delivery__info">
        </div>
    </div>
</div>
