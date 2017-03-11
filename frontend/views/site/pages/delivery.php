<?php

/* @var $this yii\web\View */

use frontend\components\extensions\Html;
use yii\widgets\Menu;
use frontend\components\menu\Navigation;

$this->title = Yii::t('frontend/site', 'Delivery service');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="page-delivery">
    <h1 class="page-delivery__title"><?= Html::encode($this->title) ?></h1>
    <div class="page-delivery__layout">
        <div class="page-delivery__menu">
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
        <div class="page-delivery__info">
            <div class="delivery-info">
                <div class="delivery-info__section">
                    <div class="delivery-info__title">
                        Доставка EMS Почта России
                    </div>
                    <div class="delivery-info__article">
                        Если представленные выше транспортные компании не доставляют груз в ваш
                        населенный пункт, то вы можете выбрать доставку EMS Почта России. Отправка
                        груза будет произведена за счет получателя по тарифам EMS Почта России.
                        Отправка осуществляется после получения оплаты нашим интернет-магазином.
                        EMS Почта России не предоставляет возможность оплачивать доставку при
                        получении. Существуют ограничения по товарам, весу и размерам, отправляемых
                        EMS Почта России. Ознакомиться с ними вы сможете здесь. Для отслеживания
                        вашего отправления используйте сайт EMS Почта России и номер вашего
                        отправления, который предоставит Вам наша служба поддержки.
                    </div>
                </div>
                <div class="delivery-info__section">
                    <div class="delivery-info__title">
                        Доставка транспортными компаниями
                    </div>
                    <div class="delivery-info__article">
                        Если представленные выше транспортные компании не доставляют груз в ваш населенный пункт,
                        то вы можете выбрать доставку EMS Почта России. Отправка груза будет произведена за счет
                        получателя по тарифам EMS Почта России. Отправка осуществляется после получения оплаты нашим
                        интернет-магазином. EMS Почта России не предоставляет возможность оплачивать доставку при
                        получении. Существуют ограничения по товарам, весу и размерам, отправляемых EMS Почта России.
                        Ознакомиться с ними вы сможете здесь. Для отслеживания вашего отправления используйте сайт
                        EMS Почта России и номер вашего отправления, который предоставит Вам наша служба поддержки.
                        <br />
                        <br />
                        При получении товара в транспортной компании внимательно проверьте:
                        <br />
                        <br />
                        Соответствие данных о грузополучателе, указанных на местах, с Вашими данными;
                        <br />
                        Целостность упаковки всех мест заклеенной контрольной полосой (фирменным скотчем оранжевого
                        цвета с логотипом «URRAA»);
                        <br />
                        Соответствие фактического количества мест количеству, указанному в ТТН;
                        <br />
                        Общий Вес всех мест и объём (Взвешивайте груз и контролируйте объём. Это поможет Вам
                        определить, на каком этапе возникла недостача. Сравните его с указным в ТТН.)
                        <br />
                        Убедившись, что информация о Вашем грузе соответствует данным, указанным в товарной накладной,
                        подписывайте документы о получении.
                        <br />
                        <br />
                        Важно! В случае если:
                        <br />
                        <ul>
                            <li>нарушена упаковка;</li>
                            <li>вес и объем груза меньше (больше) заявленного в ТТН;</li>
                            <li>вам передают не Ваш груз;</li>
                            <li>короба мокрые;</li>
                            <li>вам передают не полное количество мест;</li>
                            <li>передают поврежденные короба;</li>
                            <li>короба заклеенные прозрачным или коричневым скотчем,</li>
                        </ul>
                        то необходимо всё зафиксировать письменно в ТТН, непосредственно при ее подписании в
                        транспортной компании. Важно составить АКТ получить в нем роспись представителя транспортной
                        компании. Взять себе 1 экземпляр оригинала Акта. Дополнительно нужно сделать фотографии
                        фиксирующие факты, описанные в Акте. Скан копии Акта, ТТН и фотографии незамедлительно
                        отправить нам для выставления претензии к перевозчику.
                    </div>
                </div>
                <div class="delivery-info__section">
                    <div class="delivery-info__title">
                        Самовывоз
                    </div>
                    <div class="delivery-info__article">
                        Если представленные выше транспортные компании не доставляют груз в ваш населенный пункт,
                        то вы можете выбрать доставку EMS Почта России. Отправка груза будет произведена за счет
                        получателя по тарифам EMS Почта России. Отправка осуществляется после получения оплаты
                        нашим интернет-магазином. EMS Почта России не предоставляет возможность оплачивать доставку
                        при получении. Существуют ограничения по товарам, весу и размерам, отправляемых EMS Почта
                        России. Ознакомиться с ними вы сможете здесь. Для отслеживания вашего отправления
                        используйте сайт EMS Почта России и номер вашего отправления, который предоставит Вам
                        наша служба поддержки.
                    </div>
                </div>
                <div class="delivery-info__section">
                    <div class="delivery-info__title delivery-info__title_info">
                        Остались вопросы? Всегда рады помочь вам!
                    </div>
                    <div class="delivery-info__article">
                        Москва: 8(903) 104-29-95 <br />
                        Регионы: 8(903) 104-29-95 <br />
                        Email: etv06@mail.ru
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>