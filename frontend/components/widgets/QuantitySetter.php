<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 27.01.17
 * Time: 14:26
 */

namespace frontend\components\widgets;

use yii\helpers\ArrayHelper;
use frontend\components\extensions\Html;

class QuantitySetter extends \frontend\components\extensions\Widget
{
    public $startValue;
    public $options;

    protected function renderParams()
    {
        $inputOptions = $this->options['input'];
        $widgetOptions = ArrayHelper::getValue($this->options, 'widget', []);
        Html::addCssClass($inputOptions, ['quantity-setter__input']);
        return [
            'startValue' => $this->startValue,
            'inputOptions' => $inputOptions,
            'widgetOptions' => $widgetOptions
        ];
    }
}