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
        <div class="login__user">
            <?= $username ?>
        </div>
    </div>
</a>

<?php if ($isAdmin) {
    echo Html::a(Yii::t('frontend/site', 'Admin area'), $adminUrl, [
        'class' => 'button button_block'
    ]);
} ?>