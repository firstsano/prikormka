<?php

namespace frontend\components\widgets;

use yii\helpers\ArrayHelper;

class RangeSlider extends \frontend\components\extensions\Widget
{
    public $inputs;
    public $min;
    public $max;
    public $range;
    public $step;

    /**
     * @inheritdoc
     */
    protected function renderParams()
    {
        return [
            'options' => [
                'start' => $this->getRange(),
                'min' => $this->rangeMin,
                'max' => $this->rangeMax,
                'step' => $this->step,
                'inputs' => $this->inputs
            ]
        ];
    }

    public function getRange()
    {
        $start = ArrayHelper::getValue($this->range, 'start');
        $start = is_null($start) ? $this->startRange() : $start;
        $end = ArrayHelper::getValue($this->range, 'end');
        $end = is_null($end) ? $this->endRange() : $end;
        return [$start, $end];
    }

    private function startRange()
    {
        return ($this->rangeMin + 0.2 * $this->diff);
    }

    private function endRange()
    {
        return ($this->rangeMax - 0.2 * $this->diff);
    }

    public function getDiff()
    {
        return ($this->rangeMax - $this->rangeMin);
    }

    public function getRangeMax()
    {
        return ceil($this->max / 100) * 100;
    }

    public function getRangeMin()
    {
        return floor($this->min / 100) * 100;
    }
}