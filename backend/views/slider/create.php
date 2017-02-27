<?php

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $categories common\models\ArticleCategory[] */

$this->title = Yii::t('common\actions', 'Create carousel item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common\site', 'Carousel'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">
    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
