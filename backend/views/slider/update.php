<?php

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = Yii::t('common\actions', 'Update carousel item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common\site', 'Carousel'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('common\actions', 'Update');
?>
<div class="article-update">
    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
