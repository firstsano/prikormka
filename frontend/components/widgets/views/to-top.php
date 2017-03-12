<?php

/* @var $this \yii\web\View */

use frontend\components\extensions\Html;

\frontend\components\widgets\assets\ToTopAsset::register($this);

?>

<div class="to-top">
    <?= Html::icon('keyboard_arrow_up', [
        'class' => 'to-top__icon'
    ]) ?>
</div>
