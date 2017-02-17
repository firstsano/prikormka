<?php

/* @var $this \yii\web\View */
/* @var $products \frontend\models\Product[] */
/* @var $model \frontend\models\OrderForm */

use frontend\components\extensions\Html;
use frontend\components\widgets\FlashMessages;
use frontend\components\extensions\SimpleActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;

$this->title = Yii::t('frontend/site', 'Forming order');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="order-new">
    <h1 class="order-new__title"><?= $this->title ?></h1>
    <?= Yii::$app->flash->renderFlash() ?>
    <?= FlashMessages::widget([
        'messages' => [
            [
                'title' => 'Уважаемый покупатель!',
                'message' => "Просим указывать верные и корректные данные. " .
                    "Они необходимы для своевременной отправки вашего заказа <br />" .
                    "Обратите внимание на поля, помеченные звездочкой. " .
                    "Эти поля обязательны к заполнению."
            ]
        ]
    ]) ?>

    <br />
    <br />

    <div class="order-form">
        <div class="order-form__title"> Информация для оплаты и доставки заказа </div>
        <?php $form = SimpleActiveForm::begin([
            'id' => 'order-form',
            'action' => ['order/create']
        ]) ?>
        <div class="order-new__form">
            <div class="order-new__section-title"> Данные покупателя: </div>
            <div class="order-new__section">
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'phone') ?>
                <?= $form->field($model, 'email') ?>
                <?php //echo $form->field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>
            </div>
            <div class="order-new__section-title"> Данные для отправки: </div>
            <div class="order-new__section">
                <?= $form->field($model, 'address') ?>
            </div>
        </div>

        <br />
        <br />

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

        <?= Html::beginTag('div', ['class' => 'simple-form__actions']) ?>
        <?= $form->submit(Yii::t('frontend/site', 'Form order')) ?>
        <?= Html::endTag('div') ?>
        <?php SimpleActiveForm::end() ?>
    </div>
</div>