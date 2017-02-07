<?php

/* @var $this yii\web\View */

use frontend\components\extensions\Html;
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
        <div class="header-info__cart">
            <a href="<?= Url::to(['/site/cart']) ?>" class="cart">
                <?= Html::img('@icons/bag.png', ['class' => 'cart__image']) ?>
                <div class="cart__count"> <?= Yii::$app->cart->count ?> </div>
                <div class="cart__total">
                    <?= Yii::$app->cart->cost ?>
                    <sub class="cart__units">руб</sub>
                </div>
            </a>
        </div>
        <div class="header-info__lk">
            <?php
                echo Html::a('Личный кабинет', Yii::$app->user->loginUrl, [
                    'class' => 'button button_block center'
                ]);
                if (!Yii::$app->user->isGuest) {
                    echo Html::tag('br');
                    $link = Yii::$app->user->identity->publicIdentity .
                        Html::icon('exit_to_app');
                    echo Html::a($link, ['/user/sign-in/logout'], [
                        'class' => 'button button_block center',
                        'data' => ['method' => 'POST']
                    ]);
                }
            ?>
        </div>
    </div>
</div>