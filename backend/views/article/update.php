<?php

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = Yii::t('common\actions', 'Update article');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('common\actions', 'Update');
?>
<div class="article-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
    ]) ?>

</div>
