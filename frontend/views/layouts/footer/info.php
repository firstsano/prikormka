<?php

/* @var $this \yii\web\View */

use yii\helpers\Html;

?>


<div class="footer-info">
    <div class="footer-info__layout-container">
        <div class="footer-info__layout">
            <div class="footer-info__fisher">
                <?= Html::img('@img/assets/fisher.png', [
                    'alt' => 'Рыбак',
                    'class' => 'footer-info__fisher-image'
                ]) ?>
            </div>
            <div class="footer-info__promo">
                <div class="footer-info__layout"></div>
            </div>
        </div>
    </div>
</div>
