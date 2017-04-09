<?php

/* @var $this \yii\web\View */
/* @var $model \frontend\models\search\ProductSearch */
/* @var $params array */

use frontend\components\extensions\Html;
use common\models\Product;
use common\models\Category;
use frontend\components\widgets\CategoriesCheckboxList;

\frontend\components\widgets\assets\CatalogFilterAsset::register($this);

?>

<?= Html::beginForm(['/catalog/index'], 'get', ['class' => 'filter']) ?>
    <div class="filter__section">
        <div class="filter__a-values filter__a-values_no-margin">
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
            <?= Html::materialCheckBoxList('seasons[]', @$params['seasons'],
                Product::seasons(), ['label' => ['class' => 'filter__input-label']]) ?>
        </div>
    </div>
    <div class="filter__section">
        <div class="filter__a-title">
            Категория
        </div>
        <hr class="filter__splitter" />
        <div class="filter__a-values">
            <?= CategoriesCheckboxList::widget([
                'categories' => Category::find()->root()->all(),
                'checked' => @$params['categories'],
                'options' => [
                    'label' => ['class' => 'filter__input-label']
                ]
            ]) ?>
        </div>
        <br />
    </div>
    <div class="filter__reset">
        <?php
            echo Html::submitButton(Yii::t('frontend/site', 'Apply filter'), ['class' => 'filter__submit']);
            echo Html::submitButton(Yii::t('frontend/site', 'Apply filter'), ['class' => 'filter__submit filter__submit_additional']);
            echo Html::tag('br');
            $icon = Html::textIcon('Сбросить', 'replay', false);
            echo Html::a($icon, ['/catalog/index'], ['class' => 'button button_block button_filtered'])
        ?>
    </div>
<?= Html::endForm() ?>
