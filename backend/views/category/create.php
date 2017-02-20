<?php

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $categories common\models\Category[] */

use yii\helpers\Html;

$this->title = Yii::t('common\actions', 'Create category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend\site', 'Categories'),
    'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_form', [
        'model' => $model,
        'categories' => $categories
    ]) ?>
</div>
