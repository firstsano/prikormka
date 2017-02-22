<?php

/* @var $this \yii\web\View */

use yii\widgets\Menu;
use frontend\modules\cab\components\menu\Cab;

$this->beginContent('@frontend/views/layouts/main.php');

?>

<div class="cab">
    <div class="cab__layout">
        <div class="cab__controls">
            <?= Menu::widget([
                'items' => Cab::items(),
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
        <div class="cab__content">
            <?= $content ?>
        </div>
    </div>
</div>

<?php
$this->endContent();