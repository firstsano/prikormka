<?php

/* @var $this \yii\web\View */

use frontend\components\extensions\Html;

$this->title = Yii::t('frontend/site', 'Empty cart');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="cart-empty">
    <h1 class="cart-empty__title"><?= $this->title ?></h1>
    <div>
        В вашей корзине пока ничего нет...
        <br />
        <br />
        <?= Html::a('Перейти к покупкам', ['/catalog/index'], [
            'class' => 'button'
        ]) ?>
    </div>
</div>
