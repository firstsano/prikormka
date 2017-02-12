<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use frontend\components\extensions\Html;
use frontend\components\widgets\Cart;
use frontend\components\widgets\Login;

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
                'url' => Yii::$app->user->isGuest ?
                    Url::to(['/order/new']) : Url::to(['/cab/order/new']),
                'count' => Yii::$app->cart->count,
                'cost' => Yii::$app->cart->cost,
            ]) ?>
        </div>
        <div class="header-info__lk">
            <?= Login::widget([
                'isGuest' => Yii::$app->user->isGuest,
                'isAdmin' => Yii::$app->user->can('administrator'),
                'username' => Yii::$app->user->identity ?
                    Yii::$app->user->identity->publicIdentity : "",
                'loginUrl' => Yii::$app->user->loginUrl,
                'logoutUrl' => ['/user/sign-in/logout'],
                'adminUrl' => ['/admin'],
                'cabUrl' => ['/cab']
            ]) ?>
        </div>
    </div>
</div>