<?php

/* @var $this \yii\web\View */
/* @var $required float */
/* @var $cart float */
/* @var $rest float */

?>

<div class="min-order">
    <div class="min-order__min-sum">
        Минимальная сумма для заказа =
        <?= format_fl($required) ?>
        рублей.
    </div>
    <div class="min-order__cart-sum">
        Сумма в вашей корзине:
        <span class="min-order__cart-sum-value"> <?= format_fl($cart) ?> рублей</span>
        .
    </div>
    <?php if ($rest > 0): ?>
        <div class="min-order__required">
            Для оформления заказа вам надо добавить товаров на сумму <?= format_fl($rest) ?> рублей.
        </div>
    <?php endif ?>
</div>
