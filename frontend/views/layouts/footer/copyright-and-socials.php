<?php

/* @var $this \yii\web\View */

use yii\helpers\Html;

?>

<div class="footer-cas">
    <div class="footer-cas__layout">
        <div class="footer-cas__copyright">
            &copy; 2017 Все права защищены.
        </div>
        <div class="footer-cas__socials">
            <?= Html::img('@icons/twitter.png', ['alt' => 'Twitter', 'class' => 'footer-cas__social']) ?>
            <?= Html::img('@icons/instagram.png', ['alt' => 'Instagram', 'class' => 'footer-cas__social']) ?>
            <?= Html::img('@icons/facebook.png', ['alt' => 'Facebook', 'class' => 'footer-cas__social']) ?>
        </div>
    </div>
</div>
