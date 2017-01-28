<?php

/* @var $this yii\web\View */

use frontend\components\extensions\Html;

?>

<div class="client-comment">
    <header class="client-comment__client-info">
        <div class="client-comment__client-image">
            <?= Html::img('@img/assets/temp1.png', [
                'alt' => 'Артем Симохин',
            ]) ?>
        </div>
        <div class="client-comment__client-desc">
            <div class="client-comment__client-name">
                Артем Симохин
            </div>
            <div class="client-comment__client-experience">
                Рыбалов-любитель
            </div>
        </div>
    </header>
    <div class="client-comment__comment">
        После того как я начал использовать эту прикормку рыбки
        просто сами вешаются на крюбчок. Мне даже ничего не надо делать
        я сижу на речке и думаю о вечности, и тут бац и рыбка
        попалась. В общем крайне рекомендую, т.к. я до этого 3
        года пользовался другой прикормколй но эффект не тот.
    </div>
</div>
