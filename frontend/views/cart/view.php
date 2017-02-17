<?php

/* @var $this \yii\web\View */
/* @var $products \frontend\models\Product[] */
/* @var $model \frontend\models\OrderForm */

use frontend\components\extensions\Html;
use frontend\components\widgets\FlashMessages;
use frontend\components\widgets\MinOrderMessage;

$this->title = Yii::t('frontend/site', 'Cart');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="cart-view">
    <h1 class="cart-view__title"><?= $this->title ?></h1>
    <?= Yii::$app->flash->renderFlash() ?>

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

    <?= FlashMessages::widget([
        'messages' => [
            [
                'title' => 'Уважаемый покупатель!',
                'message' => MinOrderMessage::widget([
                    'required' => Yii::$app->params['minOrder'],
                    'cart' => Yii::$app->cart->cost
                ])
            ]
        ]
    ]) ?>

    <br />
    <br />

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
                <td class="cart-details__body-cell">
                    <?= Html::icon('clear', ['class' => 'cart-details__action']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <br />
    <br />
    
    <div class="cart-total">
        <div class="cart-total__price">
            Итого: <?= Yii::$app->cart->cost ?> руб.
        </div>
        <br />
        <br />
        <div class="cart-total__controls">
            <?= Html::a('Продолжить покупки', ['catalog/index'], [
                'class' => 'cart-total__control cart-total__control_filtered'
            ]) ?>
            <?= Html::a(Yii::t('frontend/site', 'Form order'), ['order/new'], [
                'class' => 'cart-total__control'
            ]) ?>
        </div>
    </div>

<!--    <br />-->
<!--    <hr class="separator" />-->
</div>