<?php

/* @var $this \yii\web\View */
/* @var $url string */
/* @var $count integer */
/* @var $cost integer */

use frontend\components\extensions\Html;

\frontend\components\widgets\assets\CartAsset::register($this);

?>

<a href="<?= $url ?>" class="cart">
    <?= Html::img('@icons/bag.png', ['class' => 'cart__image']) ?>
    <div class="cart__count"> <?= $count ?> </div>
    <div class="cart__total">
        <span class="cart__cost"> <?= $cost ?> </span>
        <sub class="cart__units">руб</sub>
    </div>
</a>