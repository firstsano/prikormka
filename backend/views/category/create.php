<?php

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $categories common\models\Category[] */

$this->title = Yii::t('common\actions', 'Create category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend\site', 'Categories'),
    'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">
    <?php echo $this->render('_form', [
        'model' => $model,
        'categories' => $categories
    ]) ?>
</div>
