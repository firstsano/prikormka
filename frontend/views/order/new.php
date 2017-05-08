<?php

/* @var $this \yii\web\View */
/* @var $products \frontend\models\Product[] */
/* @var $model \frontend\models\OrderForm */

use frontend\components\extensions\Html;
use frontend\components\widgets\FlashMessages;
use frontend\components\extensions\SimpleActiveForm;
use common\models\Order;
use frontend\models\OrderForm;
use yii\jui\DatePicker;
use yii\widgets\MaskedInput;
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
            'enableClientValidation' => false,
            'action' => ['order/create']
        ]) ?>
        <div class="order-new__form">
            <div class="order-new__section-title text-center">
                <?= $form->field($model, 'clientType')->label(false)->radioList(OrderForm::clientTypes(), [
                    'id' => 'client-type-select',
                    'class' => 'simple-form__radiolist',
                    'item' => function($index, $label, $name, $checked, $value) {
                        $id = "$name-$index";
                        $input = Html::radio($name, $checked, [
                            'id' => $id,
                            'value' => $value
                        ]);
                        $input .= Html::label($label, $id, ['class' => 'simple-form__radiolist-label simple-form__radiolist-label_light']);
                        return Html::tag('div', $input, ['class' => 'simple-form__radiolist-item']);
                    }
                ]) ?>
            </div>
            <hr />
            <div class="order-new__section-title"> Контактная информация: </div>
            <div class="order-new__section">
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                    'mask' => '(999) 999-9999',
                    'options' => ['class' => 'simple-form__input']
                ]) ?>
                <?= $form->field($model, 'email') ?>
            </div>
            <div class="order-new__section-title"> Данные для отправки: </div>
            <div class="order-new__section">
                <?= $form->field($model, 'address') ?>
                <?= $form->field($model, 'delivery')->radioList(Order::deliveries(), [
                    'class' => 'simple-form__radiolist',
                    'item' => function($index, $label, $name, $checked, $value) {
                        $id = "$name-$index";
                        $input = Html::radio($name, $checked, [
                            'id' => $id,
                            'value' => $value
                        ]);
                        $input .= Html::label($label, $id);
                        return Html::tag('div', $input, ['class' => 'simple-form__radiolist-item']);
                    }
                ]) ?>
            </div>
            <div data-client-type="<?= implode(',', [OrderForm::JURIDICAL, OrderForm::INDIVIDUAL]) ?>">
                <div class="order-new__section-title"> Данные компании: </div>
                <div class="order-new__section">
                    <?= $form->field($model, 'companyName') ?>
                    <?= $form->field($model, 'inn') ?>
                    <?= $form->field($model, 'kpp') ?>
                    <?= $form->field($model, 'companyAddress') ?>
                    <?= $form->field($model, 'signerName') ?>
                </div>
            </div>
            <div data-client-type="<?= implode(',', [OrderForm::JURIDICAL, OrderForm::INDIVIDUAL]) ?>">
                <div class="order-new__section-title"> Банковские реквизиты: </div>
                <div class="order-new__section">
                    <?= $form->field($model, 'bik') ?>
                    <?= $form->field($model, 'checkingAccount') ?>
                    <?= $form->field($model, 'bankName') ?>
                    <?= $form->field($model, 'corAccount') ?>
                    <?= $form->field($model, 'bankCity') ?>
                </div>
            </div>
            <div data-client-type="<?= implode(',', [OrderForm::INDIVIDUAL]) ?>">
                <div class="order-new__section-title"> Свидетельство о регистрации: </div>
                <div class="order-new__section">
                    <?= $form->field($model, 'ogrnip') ?>
                    <?= $form->field($model, 'series') ?>
                    <?= $form->field($model, 'regNumber') ?>
                    <?= $form->field($model, 'receiveDate')->widget(DatePicker::classname(), [
                        'options' => ['class' => 'simple-form__input'],
                        'dateFormat' => 'yyyy-MM-dd',
                    ]) ?>
                </div>
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

<?php

$radioToggle = <<< 'JS'
    var toggleClientType = function($radio) {
        var value = $radio.find('input:checked').val();
        var hideableForms = $('.order-form').find("[data-client-type]");
        $.each(hideableForms, function(i, form) {
            var $form = $(form);
            var formTypes = $form.data('client-type').split(',');
            if($.inArray(value, formTypes) === -1) { console.log(value, formTypes); $form.hide(); }
            else { $form.show(); }
        });
    };

    toggleClientType($('#client-type-select'));
    $('body').on('click', '#client-type-select', function() { toggleClientType($(this)); });
JS;

echo $this->registerJs($radioToggle);
