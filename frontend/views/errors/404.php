<?php

/* @var $this \yii\web\View */

use frontend\components\widgets\NavMessage;
use frontend\components\extensions\Html;

?>

<div class="site-error">
    <h1 class="site-error__404-title">Страница не найдена</h1>
    <div class="site-error__404-description">
        К сожалению, страница, которую вы искали, не найдена <br />
        <?= Html::img('@img/assets/404.png', [
            'alt' => 'Страница не найдена',
            'class' => 'site-error__404-image'
        ]) ?>
    </div>
    <br />
    <br />
    <div class="text-center"> <?= NavMessage::widget() ?> </div>
</div>


