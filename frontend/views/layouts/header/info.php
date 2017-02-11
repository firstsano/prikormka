<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use frontend\components\extensions\Html;
use frontend\components\widgets\Cart;

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
            <?= Cart::widget([
                'url' => Url::to(['/order/new']),
                'count' => Yii::$app->cart->count,
                'cost' => Yii::$app->cart->cost,
            ]) ?>
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
                if (Yii::$app->user->can('administrator')) {
                    echo Html::tag('br');
                    echo Html::a('Админка', ['/admin'], [
                        'class' => 'button button_block center',
                    ]);
                }
            ?>
        </div>
    </div>
</div>