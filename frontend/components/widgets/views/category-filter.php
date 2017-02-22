<?php

/* @var $this \yii\web\View */
/* @var $categories array */
/* @var $formOptions array */

use frontend\components\extensions\Html;

\frontend\components\widgets\assets\CategoryFilterAsset::register($this);

?>

<?= Html::beginTag('div', $formOptions) ?>
<div class="filter__section">
    <div class="filter__a-title">
        Категория
    </div>
    <hr />
    <div class="filter__a-values">
        <?= Html::recursiveMenu($categories, ['class' => 'filter-menu']) ?>
    </div>
</div>
<?= Html::endTag('div') ?>
