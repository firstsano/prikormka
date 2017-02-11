<?php

/* @var $this \yii\web\View */
/* @var $inputOptions array */
/* @var $maxLengthDummy integer */
/* @var $htmlOptions array */

use frontend\components\extensions\Html;

\frontend\components\widgets\assets\SelectorAsset::register($this);
Html::addCssClass($htmlOptions, 'selector');

?>

<?= Html::beginTag('div', $htmlOptions) ?>
<div class="selector__auto-size"> <?= $maxLengthDummy ?> </div>
<div class="selector__label"></div>
<?= Html::dropDownList(
    $inputOptions['name'],
    $inputOptions['selected'],
    $inputOptions['options'],
    ['class' => 'selector__select']
) ?>
<?= Html::endTag('div') ?>
