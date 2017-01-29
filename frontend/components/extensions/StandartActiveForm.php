<?php

namespace frontend\components\extensions;

use frontend\components\extensions\Html;

class StandartActiveForm extends \yii\widgets\ActiveForm
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, ['standart-form']);
        $this->fieldConfig = array_merge(
            $this->fieldConfig,
            [
                'options' => [
                    'class' => 'standart-form__form-input',
                ],
                'inputOptions' => [
                    'class' => 'standart-form__input'
                ],
                'labelOptions' => [
                    'class' => 'standart-form__label'
                ],
                'errorOptions' => [
                    'class' => 'standart-form__error'
                ]
            ]
        );
    }

    /**
     * Renders submit button
     */
    public function submit($message, $options)
    {
        Html::addCssClass($options, 'standart-form__submit');
        return Html::submitButton(
            $message,
            $options
        );
    }
}