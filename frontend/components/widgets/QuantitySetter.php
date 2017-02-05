<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 27.01.17
 * Time: 14:26
 */

namespace frontend\components\widgets;

use frontend\components\extensions\Html;

class QuantitySetter extends \frontend\components\extensions\Widget
{
    public $options;

    protected function renderParams()
    {
        $inputOptions = $this->options['input'];
        Html::addCssClass($inputOptions, ['quantity-setter__input']);
        return [
            'inputOptions' => $inputOptions
        ];
    }
}