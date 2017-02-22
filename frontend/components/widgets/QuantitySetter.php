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
        $inputOptions = ArrayHelper::getValue($this->options, 'input', []);
        $clientOptions = ArrayHelper::getValue($this->options, 'client', []);
        $htmlOptions = ArrayHelper::getValue($this->options, 'widget', []);
        $widgetOptions = ArrayHelper::merge(
            $htmlOptions,
            ['data' => $clientOptions]
        );
        Html::addCssClass($widgetOptions, ['quantity-setter']);
        Html::addCssClass($inputOptions, ['quantity-setter__input']);
        return [
            'startValue' => $this->startValue,
            'inputOptions' => $inputOptions,
            'widgetOptions' => $widgetOptions,
        ];
    }
}