<?php

/* @var $this \yii\web\View */
/* @var $url string */

frontend\components\widgets\assets\QuickSearchAsset::register($this);

?>

<div class="quick-search" data-url="<?= $url ?>">
    <input type="text" class="quick-search__input" placeholder="Поиск" />
    <div class="quick-search__results"></div>
</div>
