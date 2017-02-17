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
            </div>
            <div class="order-new__section-title"> Данные для отправки: </div>
            <div class="order-new__section">
                <?= $form->field($model, 'address') ?>
            </div>
        </div>

        <br />
        <br />

        <div> Состав заказа </div>
        <br />
        <table class="cart-details">
            <thead class="cart-details__header">
                <tr>
                    <th width="10%" class="cart-details__header-cell"></th>
                    <th width="40%" class="cart-details__header-cell"> Наименование </th>
                    <th width="*" class="cart-details__header-cell"> Цена за единицу </th>
                    <th width="*" class="cart-details__header-cell"> В упаковке </th>
                    <th width="*" class="cart-details__header-cell"> Вес </th>
                    <th width="*" class="cart-details__header-cell"> Сумма </th>
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
                        <td class="cart-details__body-cell">
                            <?= $product->price ?> руб.
                        </td>
                        <td class="cart-details__body-cell">
                            <?= $product->pack_quantity ?> шт.
                        </td>
                        <td class="cart-details__body-cell">
                            <?= $product->weight ?> г.
                        </td>
                        <td class="cart-details__body-cell">
                            <?= $product->totalPrice ?> руб.
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="cart-total">
            <div class="cart-total__price">
                Итого: <?= Yii::$app->cart->cost ?> руб.
            </div>
        </div>

        <?= $form->field($model, 'comment', [
            'options' => [
                'class' => 'simple-form__form-input ' .
                    'simple-form__form-input_blocked '
            ]
        ])->textarea(['rows' => 4]) ?>

        <?= Html::beginTag('div', ['class' => 'simple-form__actions']) ?>
<!--            --><?php // $form->field($model, 'reCaptcha')->widget(ReCaptcha::className())->label(false) ?>
        <?= $form->submit(Yii::t('frontend/site', 'Form order')) ?>
        <?= Html::endTag('div') ?>
        <?php SimpleActiveForm::end() ?>
    </div>
</div>