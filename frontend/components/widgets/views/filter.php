<?php

/* @var $this \yii\web\View */

use frontend\components\extensions\Html;

?>

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
