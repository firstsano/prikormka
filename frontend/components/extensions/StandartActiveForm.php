<?php

namespace frontend\components\extensions;

class StandartActiveForm extends \yii\widgets\ActiveForm
{
    /**
     * @inheritdoc
     */
    public function init()
    {
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
        parent::init();
    }

    /**
     * Renders submit button
     */
    public function submit($message, $options = [])
    {
        Html::addCssClass($options, 'standart-form__submit');
        return Html::submitButton(
            $message,
            $options
        );
    }
}