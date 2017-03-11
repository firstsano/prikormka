<?php

/* @var $this \yii\web\View */
/* @var $model \frontend\models\search\ProductSearch */
/* @var $params array */

use frontend\components\extensions\Html;
use common\models\Product;
use common\models\Category;
use frontend\components\widgets\RangeSlider;
use frontend\components\widgets\CategoryRadioList;

?>

<?= Html::beginForm(['/catalog/index'], 'get', ['class' => 'filter']) ?>
    <div class="filter__section">
        <div class="filter__a-values">
            <?= Html::checkbox('isNew', @$params['isNew'], [
                'id' => 'isNew',
                'class' => 'filled-in',
            ]) ?>
            <?= Html::label('Новинки', 'isNew', ['class' => 'filter__input-label']) ?>
        </div>
    </div>
    <div class="filter__section">
        <div class="filter__a-title">
            Сезоны
        </div>
        <hr class="filter__splitter" />
        <div class="filter__a-values">
            <?= Html::checkboxList('seasons[]', @$params['seasons'], Product::seasons(), [
                'item' => function($index, $label, $name, $checked, $value) {
                    $id = "$name-$index";
                    return Html::checkbox($name, $checked, [
                            'id' => $id,
                            'class' => 'filled-in',
                            'value' => $value
                        ]) .
                        Html::label($label, $id, ['class' => 'filter__input-label']) .
                        Html::tag('br');
                }
            ]) ?>
        </div>
    </div>
    <div class="filter__section filter__section_padding_smooth">
        <div class="filter__a-title filter__a-title_padding_smooth">
            Категория
        </div>
        <hr class="filter__splitter filter__splitter_padding_smooth" />
        <div class="filter__a-values">
            <?= CategoryRadioList::widget([
                'checked' => @$params['category'],
                'categories' => Category::filters()
            ]) ?>
        </div>
    </div>
    <!--div class="filter__section">
        <div class="filter__a-title">
            Цена
        </div>
        <hr />
        <div class="filter__a-values">
            <?php
//                echo Html::hiddenInput('priceMin', @params['priceMin'], ['id' => 'product-min-price']);
//                echo Html::hiddenInput('priceMax', @params['priceMax'], ['id' => 'product-max-price']);
//                $ranges = Product::priceRanges();
//                echo RangeSlider::widget([
//                    'inputs' => [
//                        'min' => "#product-min-price",
//                        'max' => "#product-max-price"
//                    ],
//                    'range' => [
//                        'start' => $model->priceMin,
//                        'end' => $model->priceMax,
//                    ],
//                    'min' => $ranges['min'],
//                    'max' => $ranges['max'],
//                    'step' => 1
//                ])
            ?>
        </div>
    </div-->
    <div class="filter__reset">
        <?php
            echo Html::submitButton(Yii::t('frontend/site', 'Apply filter'), ['class' => 'button button_block']);
            echo Html::tag('br');
            $icon = Html::textIcon('Сбросить', 'replay', false);
            echo Html::a($icon, ['/catalog/index'], ['class' => 'button button_block button_filtered'])
        ?>
    </div>
<?= Html::endForm() ?>
