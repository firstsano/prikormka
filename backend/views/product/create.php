<?php

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $categories common\models\Category[] */

use yii\helpers\Html;

$this->title = Yii::t('common\actions', 'Create product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common\site', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_form', [
        'model' => $model,
        'categories' => $categories
    ]) ?>
</div>
