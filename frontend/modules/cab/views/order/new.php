<?php

/* @var $this \yii\web\View */
/* @var $products \frontend\models\Product[] */
/* @var $model \frontend\models\OrderForm */

use frontend\components\extensions\StandartActiveForm;

$this->title = Yii::t('frontend/site', 'Cart');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="order-new">
    <?php foreach ($products as $product): ?>
        <div>
            <?= $product->name ?> - <?= $product->quantity ?>
        </div>
    <?php endforeach; ?>
    <div class="order-new__form">
        <?php if ($model) {
            $form = StandartActiveForm::begin([
                'id' => 'order-form',
                'action' => ['order/create']
            ]);
            echo $form->field($model, 'name');
            echo $form->field($model, 'phone');
            echo $form->field($model, 'address');
            echo $form->field($model, 'email');
            echo $form->submit(Yii::t('frontend/site', 'Form order'));
            StandartActiveForm::end();
        } ?>
    </div>
</div>