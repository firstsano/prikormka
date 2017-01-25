<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $categories common\models\Category[] */

$this->title = 'Update Category: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'categories' => $categories
    ]) ?>

</div>
