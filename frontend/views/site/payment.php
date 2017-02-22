<?php

/* @var $this yii\web\View */

use frontend\components\extensions\Html;

$this->title = Yii::t('frontend/site', 'Payment');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-delivery">
    <h1 class="site-delivery__title"><?= Html::encode($this->title) ?></h1>
    <div class="site-delivery__layout">
        <div class="site-delivery__menu">
            <ul class="aside-menu">
                <li class="aside-menu__item">
                    <?= Html::a(
                        Yii::t('frontend/site', 'Delivery service'),
                        ['/site/delivery'],
                        ['class' => 'aside-menu__item-link']
                    ) ?>
                </li>
                <li class="aside-menu__item">
                    <?= Html::a(
                        $this->title,
                        '#',
                        ['class' => 'aside-menu__item-link aside-menu__item-link_active']
                    ) ?>
                </li>
                <li class="aside-menu__item">
                    <?= Html::a(
                        Yii::t('frontend/site', 'Cooperation'),
                        ['/site/cooperate'],
                        ['class' => 'aside-menu__item-link']
                    ) ?>
                </li>
            </ul>
        </div>
        <div class="site-delivery__info">
            <div class="payment-info">
                <div class="payment-info__section">
                    <div class="payment-info__title">
                        Оплата переводом на банковскую карту
                    </div>
                    <div class="payment-info__article">
                        Оплата банковской картой на сайте производится через платежную
                        систему банка "Альфа-Банк". К оплате мы принимаем карты Visa,
                        Maestro и MasterCard. Оплатить заказ с помощью банковской карты
                        очень просто и безопасно. Безопасность платежей
                        использованием SSL протокола. При оплате онлайн данные вашей банковской
                        карты надежно защищены.
                        После оформления заказа с вами свяжется наш менеджер, чтобы подтвердить
                        заказ и уточнить срок доставки.
                    </div>
                </div>
                <div class="payment-info__section">
                    <div class="payment-info__title">
                        Оплата банковским переводом по выставленному нами счету
                    </div>
                    <div class="payment-info__article">
                        Если вы хотите оплатить товар как юридическое лицо с банковского счета,
                        выберите данный метод оплаты в корзине. Мы выставим
                        вам счет в кратчайшие сроки, свяжемся для подтверждения заказа и уточнения
                        деталей доставки.
                        <br />
                        <br />
                        Всем нашим клиентам по запросу мы предоставляем всю необходимую документацию:
                        <ul>
                            <li> Договор </li>
                            <li> Товарную накладную (не забудьте ее подписать и вернуть нам по почте) </li>
                            <li> Счет-фактуру </li>
                            <li> Оригинал счета </li>
                            <li> Сертификаты соответствия</li>
                        </ul>
                    </div>
                </div>
                <div class="payment-info__section">
                    <div class="payment-info__title payment-info__title_info">
                        Остались вопросы? Всегда рады помочь вам!
                    </div>
                    <div class="payment-info__article">
                        Москва: 8(903) 104-29-95 <br />
                        Регионы: 8(903) 104-29-95 <br />
                        Email: etv06@mail.ru
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
