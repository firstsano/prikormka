<?php

/* @var $this \yii\web\View */
/* @var $feedbacks \common\models\Feedback[] */

use frontend\components\extensions\Html;
use frontend\components\widgets\ClientComment;

$this->title = Yii::t('frontend/site', 'Feedbacks');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="feedbacks-index">
    <h1 class="feedbacks-index__title"><?= $this->title ?></h1>
    <hr />
    <?php
        $comments = [];
        foreach ($feedbacks as $feedback) {
            $comments[] = ClientComment::widget(['feedback' => $feedback]);
        }
        echo implode(Html::tag('br'), $comments);
    ?>
    <hr />
</div>
