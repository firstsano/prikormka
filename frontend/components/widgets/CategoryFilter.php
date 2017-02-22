<?php

namespace frontend\components\widgets;

use yii\helpers\ArrayHelper;
use frontend\components\extensions\Html;

class CategoryFilter extends \frontend\components\extensions\Widget
{
    public $categories;
    public $options;

    protected function renderParams()
    {
        $formOptions = ArrayHelper::getValue($this->options, 'form', []);
        Html::addCssClass($formOptions, ['filter']);
        return [
            'categories' => $this->categories,
            'formOptions' => $formOptions
        ];
    }
}