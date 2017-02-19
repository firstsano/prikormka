<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 19.02.17
 * Time: 14:46
 */

namespace frontend\components\widgets;


use yii\helpers\ArrayHelper;

class AddToCart extends \frontend\components\extensions\Widget
{
    public $label;
    public $options;

    public function renderParams()
    {
        $linkOptions = ArrayHelper::getValue($this->options, 'link', []);
        $widgetOptions = ArrayHelper::getValue($this->options, 'widget', []);
        return [
            'label' => $this->label,
            'linkOptions' => $linkOptions,
            'widgetOptions' => $widgetOptions
        ];
    }
}