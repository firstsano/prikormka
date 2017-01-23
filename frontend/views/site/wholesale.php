<?php

/* @var $this \yii\web\View */

use app\components\extensions\Html;
use app\components\widgets\ProductWholesaleOrder;

?>

<div class="site-wholesale">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="breadcrumbs">
                    Главная <?= Html::icon('keyboard_arrow_right', ['class' => 'breadcrumbs__separator']) ?>
                </div>
                <h1> Все товары </h1>
                <div class="display-settings">

                </div>
                <div class="row">
                    <div class="col s3">
                        <div class="filter">
                            <div class="filter__section">
                                <div class="filter__a-title">
                                    Сезоны
                                </div>
                                <hr />
                                <div class="filter__a-values">
                                    <input type="checkbox" class="filled-in" id="test5" />
                                    <label for="test5">лето</label>
                                    <br />
                                    <input type="checkbox" class="filled-in" id="test7" />
                                    <label for="test7">зима</label>
                                    <br />
                                    <input type="checkbox" class="filled-in" id="test6" />
                                    <label for="test6">вне сезона</label>
                                </div>
                            </div>
                            <div class="filter__section">
                                <div class="filter__a-title">
                                    Вес
                                </div>
                                <hr />
                            </div>
                            <div class="filter__reset">
                                <?= Html::icon('replay') ?>
                                Сбросить
                            </div>
                        </div>
                    </div>
                    <div class="col s9">
                        <?= ProductWholesaleOrder::widget([]) ?>
                        <?= ProductWholesaleOrder::widget([]) ?>
                        <?= ProductWholesaleOrder::widget([]) ?>
                        <?= ProductWholesaleOrder::widget([]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

