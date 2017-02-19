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
            <?php
                $img = Html::img('@img/logo/logo.png', ['class' => 'header-info__logotype']);
                echo Html::a($img, Yii::$app->homeUrl);
            ?>
        </div>
        <div class="header-info__order-phones">
            <div>
                <span class="header-info__order-location">Москва: </span>
                <span class="header-info__order-phone"> 8 (903) 104-29-95 </span>
            </div>
            <div>
                <span class="header-info__order-location">Регионы: </span>
                <span class="header-info__order-phone"> 8 (960) 882-22-22 </span>
            </div>
            <div class="header-info__order-work-times">
                <span class="header-info__order-work-time"> Время работы </span>
                <span class="header-info__order-work-time header-info__order-work-time_highlight"> с 8:00 до 20:00 </span>
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
                    'url' => Url::to(['/cart/view']),
                    'count' => Yii::$app->cart->count,
                    'cost' => Yii::$app->cart->cost,
                ]) ?>
            </div>
        </div>

    </div>
</div>