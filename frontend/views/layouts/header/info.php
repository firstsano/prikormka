<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="header-info">
    <div class="header-info__layout">
        <div class="header-info__logotype">
            <?= Html::img('@img/logo/logotype.png', ['class' => 'responsive-img']) ?>
        </div>
        <div class="header-info__wholesale">
            <a href="<?= Url::to(['site/wholesales']) ?>" class="wholesale-link">
                <?= Html::img('@img/assets/wholesale.png', ['class' => 'wholesale-link__image']) ?>
                <strong class="wholesale-link__text">
                    Магазин для <br />
                    оптовых покупателей
                </strong>
            </a>
        </div>
        <div class="header-info__order-phone">
            <div class="order-phone">
                <div class="order-phone__phone"> <?= Yii::$app->params['mainPhone'] ?> </div>
                <div class="order-phone__comment"> телефон для заказа </div>
            </div>
        </div>
        <div class="header-info__search">
            <?= Html::img('@icons/search.png') ?>
        </div>
        <div class="header-info__cart">
            <div class="cart">
                <?= Html::img('@icons/bag.png', ['class' => 'cart__image']) ?>
                <div class="cart__total">
                    12000
                    <sub class="cart__units">руб</sub>
                </div>
            </div>
        </div>
        <div class="header-info__lk">
            <?= Html::a('Личный кабинет', ['site/lk'], ['class' => 'button']) ?>
        </div>
    </div>
</div>