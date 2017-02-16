<?php

/* @var $this \yii\web\View */
/* @var $isGuest boolean */
/* @var $isAdmin boolean */
/* @var $username string */
/* @var $loginUrl string */
/* @var $logoutUrl string */
/* @var $adminUrl string */
/* @var $cabUrl string */

use Yii;
use yii\helpers\Url;
use frontend\components\extensions\Html;

?>

<a href="<?= Url::to($isGuest ? $loginUrl : $cabUrl) ?>" class="login">
    <div class="login__image-layout">
        <?= Html::icon('exit_to_app', ['class' => 'login__image']) ?>
    </div>
    <div class="login__info">
        <div class="login__title"><?= Yii::t('frontend/site', 'Personal cab') ?></div>
        <div class="login__user"> <?= $username ?> </div>
    </div>
</a>

<?php
//echo Html::a(
//    Yii::t('frontend/site', 'Personal cab'),
//    ['class' => 'button button_block center']
//);

//if (!$isGuest) {
//    echo Html::tag('br');
//    $link = $username . Html::icon('exit_to_app');
//    echo Html::a(
//        Html::textIcon($username, 'exit_to_app'),
//        $logoutUrl,
//        [
//            'class' => 'button button_block center',
//            'data' => ['method' => 'POST']
//        ]
//    );
//}
//
//if ($isAdmin) {
//    echo Html::tag('br');
//    echo Html::a(
//        Yii::t('frontend/site', 'Admin area'),
//        $adminUrl,
//        ['class' => 'button button_block center']
//    );
//}