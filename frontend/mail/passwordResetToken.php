<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $token string */

use yii\helpers\Html;

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['/user/sign-in/reset-password',
    'token' => $token
]);

?>

Здравствуйте, <?= Html::encode($user->username) ?>, <br />

Пройдите по ссылке ниже для сброса пароля: <br />

<?= Html::a(Html::encode($resetLink), $resetLink) ?>
