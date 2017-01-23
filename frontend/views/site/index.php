<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

use frontend\components\extensions\Html;
use frontend\components\widgets\Carousel;
use frontend\components\widgets\ClientComment;
use frontend\components\widgets\NewsPreview;
use frontend\components\widgets\ProductQuickOrder;

?>

<div class="site-index">
    <section class="site-index__carousel">
        <?= Carousel::widget([
            'items' => [
                [
                    'img' => Yii::getAlias('@img/carousel/1.png'),
                    'title' => 'Прикормка-паста',
                    'promo' => "\"Карп-Карась\" <br>" .
                        "с <strong>40%</strong> скидкой",
                    'url' => '#'
                ],
                [
                    'img' => Yii::getAlias('@img/carousel/1.png'),
                    'title' => 'Прикормка',
                    'promo' => "\"Вобла-Карась\" <br>" .
                        "с <strong>10%</strong> скидкой",
                    'url' => '#'
                ],
                [
                    'img' => Yii::getAlias('@img/carousel/1.png'),
                    'title' => 'Снаряжение',
                    'promo' => "\"Рыболов\" <strong>new</strong>",
                    'url' => '#'
                ]
            ]
        ]) ?>
    </section>
    <section class="site-index__new-products">
        <div class="new-products">
            <h2 class="new-products__title"> Новинки </h2>
            <div class="new-products__row">
                <?
                    for($i = 0; $i < 3; $i++)  {
                        echo Html::beginTag('div', ['class' => 'col s4']);
                        echo ProductQuickOrder::widget();
                        echo Html::endTag('div');
                    }
                ?>
            </div>
            <div class="new-products__row">
                <?
                    for($i = 0; $i < 3; $i++)  {
                        echo Html::beginTag('div', ['class' => 'col s4']);
                        echo ProductQuickOrder::widget();
                        echo Html::endTag('div');
                    }
                ?>
            </div>
            <div class="center">
                <? $icon = Html::icon('keyboard_arrow_right') ?>
                <?= Html::a('Смотреть все товары ' . $icon, '#', ['class' => 'new-products__link']); ?>
            </div>
        </div>
        <br />
        <br />
    </section>
    <section class="site-index__client-comments">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h2> Клиенты о нас </h2>
                    <div class="row">
                        <div class="col s6"> <?= ClientComment::widget([]) ?> </div>
                        <div class="col s6"> <?= ClientComment::widget([]) ?> </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <br />
    </section>
    <section class="site-index__best-offer">
        <div class="row">
            <div class="col s12">
                <h2> Лучшее предложение </h2>
            </div>
            <? for($i = 0; $i < 3; $i++)  {
                echo Html::beginTag('div', ['class' => 'col s4']);
                echo ProductQuickOrder::widget();
                echo Html::endTag('div');
            } ?>
        </div>
        <br />
        <div class="center">
            <?= Html::a('Смотреть все акции ' . Html::icon('keyboard_arrow_right'), '#', ['class' => 'button_circle']) ?>
        </div>
        <br />
        <br />
    </section>
    <section class="site-index__news">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h2> Новости и статьи </h2>
                    <div class="row">
                        <div class="col s4"> <?= NewsPreview::widget([]) ?> </div>
                        <div class="col s4"> <?= NewsPreview::widget([]) ?> </div>
                        <div class="col s4"> <?= NewsPreview::widget([]) ?> </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
    </section>
</div>
