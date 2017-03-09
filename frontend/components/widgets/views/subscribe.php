<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\Subscribe */

use frontend\components\extensions\Html;

?>

<div class="subscribe">
    <div class="subscribe__message">
        Чтобы не пропустить новинки, полезные статьи и новости предлагаем вам <br />
        подписаться на email-рассылку. Обещаем присылать только самое важное и необходимое.
    </div>

    <div class="subscribe__errors">
        <?php foreach($model->errors as $attribute => $messages): ?>
            <div class="subscribe__error"><?= implode('<br />', $messages) ?></div>
        <?php endforeach; ?>
    </div>
    <?= Html::beginForm(['/site/subscribe'], 'POST', [
        'class' => 'subscribe__form'
    ]) ?>
    <?= Html::activeTextInput($model, 'email', [
        'placeholder' => 'e-mail',
        'class' => 'subscribe__input'
    ]) ?>
    <?= Html::submitButton('Подписаться', ['class' => 'subscribe__submit']) ?>
    <?= Html::endForm() ?>
</div>
