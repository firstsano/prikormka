<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use frontend\components\extensions\Html;
use frontend\components\widgets\Cart;
use frontend\components\widgets\Login;

?>

<div class="header-info">
    <div class="header-info__layout">
        <div class="header-info__logotype-layout">
            <?= Html::img('@img/logo/logo.png', ['class' => 'header-info__logotype']) ?>
        </div>
        <div class="header-info__order-phones">
            <div class="header-info__order-phone">
                Москва: 8 (903) 104-29-95
            </div>
            <div class="header-info__order-phone">
                Регионы: 8 (960) 882-22-22
            </div>
        </div>
        <div class="header-info__controls">
            <div class="header-info__controls-item">
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
            <div class="header-info__controls-item">
                <?= Cart::widget([
                    'url' => Yii::$app->user->isGuest ?
                        Url::to(['/order/new']) : Url::to(['/cab/order/new']),
                    'count' => Yii::$app->cart->count,
                    'cost' => Yii::$app->cart->cost,
                ]) ?>
            </div>
        </div>

    </div>
</div>