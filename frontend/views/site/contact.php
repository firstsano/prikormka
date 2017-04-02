<?php

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\widgets\ActiveForm;
use frontend\components\extensions\Html;

$this->title = Yii::t('frontend/site', 'Contact');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-contact">
    <div class="site-contact__layout">
        <div class="site-contact__form">
            <h2 class="site-contact__title">
                <div class="site-contact__title-text"> Свяжитесь с нами </div>
                <div class="site-contact__title-decorator"></div>
            </h2>
            <br />
            <?php $form = ActiveForm::begin([
                'id' => 'contact-form',
                'options' => [
                    'class' => 'bootstrap-form'
                ]
            ]) ?>
            <div class="row">
                <div class="col-xs-6">
                    <?php
                        $field = $form->field($model, 'name');
                        $field->inputOptions = ['class' => 'bootstrap-form__input'];
                        $field->labelOptions = ['class' => 'bootstrap-form__label'];
                        echo $field;
                    ?>
                </div>
                <div class="col-xs-6">
                    <?php
                        $field = $form->field($model, 'email');
                        $field->inputOptions = ['class' => 'bootstrap-form__input'];
                        $field->labelOptions = ['class' => 'bootstrap-form__label'];
                        echo $field;
                    ?>
                </div>
            </div>
            <br />
            <?php
                $field = $form->field($model, 'body');
                $field->inputOptions = ['class' => 'bootstrap-form__input'];
                $field->labelOptions = ['class' => 'bootstrap-form__label'];
                echo $field->textArea(['rows' => 6]);
            ?>
            <br />
            <?= Html::submitButton('Отправить сообщение', ['class' => 'bootstrap-form__submit']) ?>
            <?php ActiveForm::end(); ?>
        </div>

        <div class="site-contact__info">
            <h2 class="site-contact__title">
                <div class="site-contact__title-text"> Информация о нас </div>
                <div class="site-contact__title-decorator"></div>
            </h2>
            <br />
            <div>
                <p>
                    Компания &laquo;ЭкоТехнологии-Волгоград&raquo; является производителем и потовым поставщиком
                    рыболовных прикормок, смесей и живых наживок. Мы специализируемся на создании максимально
                    эффективной продукции, которая позволит достигать спортсменам и любителям рыболовам высоких
                    результатов.
                </p>
                <p>
                    Мы осуществляем оптовые поставки рыболовного червя, опарыша
                    и прикормки оптом в Москву, все регионы России и страны ближнего зарубежья.
                </p>
                <p>
                    Продукция компании
                    пользуется заслуженным спросом и авторитетом как в России, так и на Украине и в Белоруссии.
                    Неотъемлемой частью производства является и производство живых насадок, таких как опарыш и червь.
                </p>
            </div>
            <br />
            <h2 class="site-contact__title">
                <div class="site-contact__title-text"> Контакты </div>
                <div class="site-contact__title-decorator"></div>
            </h2>
            <ul class="icon-list">
                <li class="icon-list__item">
                    <?= Html::icon('email', ['class' => 'icon-list__icon']) ?>
                    <span class="icon-list__text"> <?= Yii::$app->params['companyEmail'] ?> </span>
                </li>
                <li class="icon-list__item">
                    <?= Html::icon('phone', ['class' => 'icon-list__icon']) ?>
                    <span class="icon-list__text"> <?= Yii::$app->params['mainPhone'] ?> </span>
                </li>
            </ul>
        </div>

    </div>
</div>
