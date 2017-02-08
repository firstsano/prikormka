<?php

/* @var $this \yii\web\View */
/* @var $products \frontend\models\Product[] */
/* @var $model \frontend\models\OrderForm */

use frontend\components\extensions\StandartActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;

$this->title = Yii::t('frontend/site', 'Cart');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="cart-view">
    <?php foreach ($products as $product): ?>
        <div>
            <?= $product->name ?> - <?= $product->quantity ?>
        </div>
    <?php endforeach; ?>
    <?php
        if ($model) {
            $form = StandartActiveForm::begin(['id' => 'order-form']);
            echo $form->field($model, 'name');
            echo $form->field($model, 'email');
            echo $form->field($model, 'phone');
            echo $form->field($model, 'address');
            echo $form->field($model, 'reCaptcha')->widget(ReCaptcha::className());
            echo $form->submit(Yii::t('frontend/site', 'Form order'));
            StandartActiveForm::end();
        }
    ?>
</div>

