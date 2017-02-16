<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\components\extensions\Breadcrumbs;

\frontend\assets\AppAsset::register($this);
?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title> <?= Html::encode($this->title) ?> </title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <?= $this->render('header') ?>
    <main class="main">
        <div class="main__breadcrumbs">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </div>
        <div class="container">
            <?= Yii::$app->flash->renderFlash() ?>
        </div>
        <?= $content ?>
    </main>
    <?= $this->render('footer') ?>
<?php $this->endBody() ?>
</body>
</html>

<?php $this->endPage() ?>
