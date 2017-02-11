<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 11.02.17
 * Time: 20:39
 */

namespace frontend\components\widgets;

use yii\helpers\ArrayHelper;

class Selector extends \frontend\components\extensions\Widget
{
    public $options;

    protected function renderParams()
    {
        $options = ArrayHelper::merge(
            $this->defaultOptions(),
            $this->options
        );
        $selectOptions = $options['input']['options'];
        $allOptions = array_merge(array_keys($selectOptions), array_values($selectOptions));
        return [
            'inputOptions' => $options['input'],
            'htmlOptions' => $options['html'],
            'maxLengthDummy' => $this->getLongestString($allOptions)
        ];
    }

    protected function defaultOptions()
    {
        return [
            'input' => [],
            'html' => []
        ];
    }

    private function getLongestString($inputArray)
    {
        $lengths = array_map('strlen', $inputArray);
        $maxLength = max($lengths);
        $index = array_search($maxLength, $lengths);
        return $inputArray[$index];
    }
}