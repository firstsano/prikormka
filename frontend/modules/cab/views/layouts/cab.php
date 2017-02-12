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
                'items' => Cab::items()
            ]) ?>
        </div>
        <div class="cab__content">
            <?= $content ?>
        </div>
    </div>
</div>

<?php
$this->endContent();