<?php

/* @var $this \yii\web\View */
/* @var $products \frontend\models\Product[] */
/* @var $model \frontend\models\OrderForm */

use frontend\components\extensions\Html;
use frontend\components\extensions\StandartActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;

$this->title = Yii::t('frontend/site', 'Cart');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="order-new">
    <h1 class="order-new__title"><?= $this->title ?></h1>
    <div class="cart-total">
        <div class="cart-total__info">
            В заказе
            <?= Html::tag('span', Yii::$app->cart->count, [
                'class' => 'cart-total__count'
            ]) ?>
            позиций
        </div>
        <?= Html::a(Html::textIcon('Очистить', 'clear', true, ['class' => 'cart-total__clear-icon']),
            '#', ['class' => 'cart-total__clear']) ?>
    </div>

    <table class="cart-details">
        <thead class="cart-details__header">
            <tr>
                <th width="10%" class="cart-details__header-cell"></th>
                <th width="30%" class="cart-details__header-cell"> Наименование </th>
                <th width="*" class="cart-details__header-cell"> Цена за единицу </th>
                <th width="*" class="cart-details__header-cell"> В упаковке </th>
                <th width="*" class="cart-details__header-cell"> Количество </th>
                <th width="*" class="cart-details__header-cell"> Вес </th>
                <th width="*" class="cart-details__header-cell"> Сумма </th>
                <th width="1px" class="cart-details__header-cell"></th>
            </tr>
        </thead>
        <tbody class="cart-details__body">
            <?php foreach ($products as $product): ?>
                <tr class="cart-details__body-row">
                    <td class="cart-details__body-cell">
                        <?= Html::img($product->mainImage->url, [
                            'class' => 'cart-details__product-image'
                        ]) ?>
                    </td>
                    <td class="cart-details__body-cell">
                        <?= Html::a($product->name, ['catalog/view', 'id' => $product->id]) ?>
                    </td>
                    <td class="cart-details__body-cell"> <?= $product->price ?> руб. </td>
                    <td class="cart-details__body-cell"> <?= $product->pack_quantity ?> шт. </td>
                    <td class="cart-details__body-cell"> <?= $product->quantity ?> </td>
                    <td class="cart-details__body-cell"> <?= $product->weight ?> г. </td>
                    <td class="cart-details__body-cell"> <?= $product->totalPrice ?> руб. </td>
                    <td class="cart-details__body-cell"> <?= Html::icon('clear') ?> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="cart-total">
        <div class="cart-total__price">
            Итого: <?= Yii::$app->cart->cost ?> руб.
        </div>
    </div>

    <div class="order-new__form">
        <?php if ($model) {
            $form = StandartActiveForm::begin([
                'id' => 'order-form',
                'action' => ['order/create']
            ]);
            echo $form->field($model, 'name');
            echo $form->field($model, 'phone');
            echo $form->field($model, 'address');
            echo $form->field($model, 'email');
            echo $form->field($model, 'reCaptcha')->widget(ReCaptcha::className());
            echo $form->submit(Yii::t('frontend/site', 'Form order'));
            StandartActiveForm::end();
        } ?>
    </div>
</div>