<?php

/* @var $this yii\web\View */

use frontend\components\extensions\Html;
use yii\widgets\Menu;
use frontend\components\menu\Navigation;

$this->title = Yii::t('frontend/site', 'Payment');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="page-payment">
    <h1 class="page-payment__title"><?= Html::encode($this->title) ?></h1>
    <div class="page-payment__layout">
        <div class="page-payment__menu">
            <?= Menu::widget([
                'items' => Navigation::contactItems(),
                'options' => [
                    'class' => 'aside-menu'
                ],
                'activeCssClass' => 'aside-menu__item_active',
                'itemOptions' => [
                    'class' => 'aside-menu__item'
                ],
                'linkTemplate' => "<a href=\"{url}\" class=\"aside-menu__item-link\">{label}</a>"
            ]) ?>
        </div>
        <div class="page-payment__info">
            <div class="payment-info">
                <div class="payment-info__section">
                    <div class="payment-info__title">
                        Способы оплаты
                    </div>
                    <div class="payment-info__article">
                        Продажа осуществляется на условиях 100% предоплаты наиболее удобным для заказчика способом:
                        <ul>
                            <li> безналичным банковским переводом на расчетный счет (без НДС); </li>
                            <li> перевод на карту Сбербанка; </li>
                            <li> электронными деньгами по системе Яндекс.Деньги или другой; </li>
                            <li> наличным расчетом при самовывозе товара из г. Волжский Волгоградской области. </li>
                        </ul>
                        Товар не предоставляется на реализацию или в рассрочку. Обратный выкуп не предусмотрен.
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
