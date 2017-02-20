<?php

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $categories common\models\Category[] */

$this->title = Yii::t('common\actions', 'Update order');
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common\actions', 'Update');
?>
<div class="product-update">
    <?php echo $this->render('_form', [
        'model' => $model,
        'categories' => $categories
    ]) ?>
</div>
