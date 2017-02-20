<?php

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $categories common\models\Category[] */

$this->title = Yii::t('common\actions', 'Create product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common\site', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">
    <?php echo $this->render('_form', [
        'model' => $model,
        'categories' => $categories
    ]) ?>
</div>
