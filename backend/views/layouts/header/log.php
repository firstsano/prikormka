<?php

/* @var $this \yii\web\View */

use yii\helpers\Html;

?>

<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-warning"></i>
    <span class="label label-danger">
                                <?php echo \backend\models\SystemLog::find()->count() ?>
                            </span>
</a>
<ul class="dropdown-menu">
    <li class="header"><?php echo Yii::t('backend', 'You have {num} log items', ['num'=>\backend\models\SystemLog::find()->count()]) ?></li>
    <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu">
            <?php foreach(\backend\models\SystemLog::find()->orderBy(['log_time'=>SORT_DESC])->limit(5)->all() as $logEntry): ?>
                <li>
                    <a href="<?php echo Yii::$app->urlManager->createUrl(['/log/view', 'id'=>$logEntry->id]) ?>">
                        <i class="fa fa-warning <?php echo $logEntry->level == \yii\log\Logger::LEVEL_ERROR ? 'text-red' : 'text-yellow' ?>"></i>
                        <?php echo $logEntry->category ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </li>
    <li class="footer">
        <?php echo Html::a(Yii::t('backend', 'View all'), ['/log/index']) ?>
    </li>
</ul>
