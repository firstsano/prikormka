<?php

/* @var $this \yii\web\View */
/* @var $model \frontend\models\search\ProductSearch */
/* @var $params array */

use frontend\components\extensions\Html;
use common\models\Category;
use frontend\components\widgets\CategoryRadioList;

\frontend\components\widgets\assets\WholesaleFilterAsset::register($this);

?>

<?= Html::beginForm(['/wholesale-catalog/index'], 'get', [
    'class' => 'filter wholesale-filter',
    'data' => ['pjax' => 1]
]) ?>
    <div class="filter__section">
        <?= Html::textInput('filter', @$params['filter'], [
            'class' => 'search',
            'placeholder' => 'Поиск...',
        ]) ?>
    </div>
    <div class="filter__section">
        <div class="filter__a-title">
            Категория
        </div>
        <hr />
        <div class="filter__a-values">
            <div class="category-radio-list">
                <?php
                    echo Html::radio('category', (!empty(@$params['category'])), [
                        'id' => 'empty-category',
                        'value' => '',
                        'class' => 'category-radio-list__radio'
                    ]);
                    echo Html::label(
                        'Все категории',
                        'empty-category',
                        ['class' => 'category-radio-list__label category-radio-list__label_important']
                    );
                ?>
            </div>
            <?= CategoryRadioList::widget([
                'checked' => @$params['category'],
                'categories' => Category::filters()
            ]) ?>
        </div>
    </div>
<?= Html::endForm() ?>
