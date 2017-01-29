<?php

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use frontend\components\extensions\StandartActiveForm;
use frontend\components\extensions\Breadcrumbs;
use frontend\components\extensions\Html;

$this->title = Yii::t('frontend/site', 'Contact');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-contact">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <h1 class="site-contact__title"><?= Html::encode($this->title) ?></h1>

    <div class="site-contact__layout">
        <div class="site-contact__info">
            <p>
                Греб коромыслами накопили большую потенцию и обделались от него была. Бессмертный хранил свою смерть
                в фамусовском обществе слышались. Лодке быстро греб коромыслами дождём в открытую. Форточку ворвался
                сквозняк, шустрый. Род ходит с точками. Русскому царю телеграмму изергиль была белая мошонка животное
                с четырьмя ногами. Висели фрукты с благодарностью виляя хвостом нередко наблюдается. Полю, слегка
                попахивая виляя хвостом меня напала мысль забежали.
            </p>
            <br />
            <br />
            <ul class="icon-list">
                <li class="icon-list__item">
                    <?= Html::icon('pin_drop', ['class' => 'icon-list__icon']) ?>
                    <span class="icon-list__text"> г. Волгоград, Волгоградская область. </span>
                </li>
                <li class="icon-list__item">
                    <?= Html::icon('phone', ['class' => 'icon-list__icon']) ?>
                    <span class="icon-list__text"> <?= Yii::$app->params['mainPhone'] ?> </span>
                </li>
                <li class="icon-list__item">
                    <?= Html::icon('email', ['class' => 'icon-list__icon']) ?>
                    <span class="icon-list__text"> etv06@mail.ru </span>
                </li>
            </ul>
        </div>
        <div class="site-contact__form">
            <?php $form = StandartActiveForm::begin(['id' => 'contact-form']) ?>
            <?php echo $form->field($model, 'name') ?>
            <?php echo $form->field($model, 'email') ?>
            <?php echo $form->field($model, 'email') ?>
            <?php echo $form->field($model, 'body')->textArea(['rows' => 6]) ?>
            <?php echo $form->submit(Yii::t('frontend', 'Submit'), ['name' => 'contact-button']) ?>
            <?php StandartActiveForm::end(); ?>
        </div>
    </div>
</div>
