<?php

namespace frontend\components\extensions;

use yii\helpers\ArrayHelper;

class SimpleActiveForm extends \yii\widgets\ActiveForm
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, ['simple-form']);
        $this->fieldConfig = ArrayHelper::merge(
            $this->fieldConfig,
            [
                'options' => [
                    'class' => 'simple-form__form-input',
                ],
                'inputOptions' => [
                    'class' => 'simple-form__input'
                ],
                'labelOptions' => [
                    'class' => 'simple-form__label'
                ],
                'errorOptions' => [
                    'class' => 'simple-form__error'
                ]
            ]
        );
    }

    /**
     * Renders submit button
     */
    public function submit($message, $options = [])
    {
        Html::addCssClass($options, 'simple-form__submit');
        return Html::submitButton(
            $message,
            $options
        );
    }
}