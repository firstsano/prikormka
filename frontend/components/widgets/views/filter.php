<?php

/* @var $this \yii\web\View */
/* @var $model \frontend\models\search\ProductSearch */

use frontend\components\extensions\Html;
use common\models\Product;
use frontend\components\widgets\RangeSlider;

?>

<?= Html::beginForm('', 'post', ['class' => 'filter']) ?>
    <div class="filter__section">
        <div class="filter__a-title">
            Сезоны
        </div>
        <hr />
        <div class="filter__a-values">
            <?= Html::activeCheckboxList($model, 'seasons', Product::seasons(), [
                'item' => function($index, $label, $name, $checked, $value) {
                    $id = "$name-$index";
                    return Html::checkbox($name, $checked, [
                        'id' => $id,
                        'class' => 'filled-in',
                        'value' => $value
                    ]) .
                    Html::label($label, $id) .
                    Html::tag('br');
                }
            ]) ?>
        </div>
    </div>
    <div class="filter__section">
        <div class="filter__a-title">
            Цена
        </div>
        <hr />
        <div class="filter__a-values">
            <?php
                echo Html::activeHiddenInput($model, 'priceMin', ['id' => 'product-min-price']);
                echo Html::activeHiddenInput($model, 'priceMax', ['id' => 'product-max-price']);
                $ranges = Product::priceRanges();
                echo RangeSlider::widget([
                    'inputs' => [
                        'min' => "#product-min-price",
                        'max' => "#product-max-price"
                    ],
                    'range' => [
                        'start' => $model->priceMin,
                        'end' => $model->priceMax,
                    ],
                    'min' => $ranges['min'],
                    'max' => $ranges['max'],
                    'step' => 1
                ])
            ?>
        </div>
    </div>
    <div class="filter__reset">
        <?php
            echo Html::submitButton(Yii::t('frontend/site', 'Apply filter'), ['class' => 'button button_block']);
            echo Html::tag('br');
            $icon = Html::textIcon('Сбросить', 'replay', false);
            echo Html::a($icon, ['/catalog/index'], ['class' => 'button button_block button_filtered'])
        ?>
    </div>
<?= Html::endForm() ?>
