<?php

/* @var $this yii\web\View */
/* @var $feedback \common\models\Feedback */

use frontend\components\extensions\Html;

?>

<div class="client-comment">
    <header class="client-comment__client-info">
        <div class="client-comment__client-image-layout">
            <?= Html::img($feedback->imageUrl, [
                'alt' => $feedback->user_name,
                'class' => 'client-comment__client-image'
            ]) ?>
        </div>
        <div class="client-comment__client-desc">
            <div class="client-comment__client-name">
                <?= $feedback->user_name ?>
            </div>
            <div class="client-comment__client-experience">
                <?= $feedback->user_prof ?>
            </div>
        </div>
    </header>
    <div class="client-comment__comment"> <?= $feedback->body ?> </div>
</div>
