<?php

/* @var $this \yii\web\View */
/* @var $url string */
/* @var $count integer */
/* @var $cost integer */

use frontend\components\extensions\Html;

\frontend\components\widgets\assets\CartAsset::register($this);

?>

<a href="<?= $url ?>" class="cart">
    <div class="cart__image-layout">
        <?= Html::img('@img/icons/add-to-cart.png', ['class' => 'cart__image']) ?>
        <div class="cart__count"> <?= $count ?> </div>
    </div>
    <div class="cart__info">
        <div class="cart__title"><?= Yii::t('frontend/site', 'Cart') ?></div>
        <div class="cart__total"> <span class="cart__cost"> <?= $cost ?> </span> руб. </div>
    </div>
</a>