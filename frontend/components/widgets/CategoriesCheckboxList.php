<?php

namespace frontend\components\widgets;

class CategoriesCheckboxList extends \frontend\components\extensions\Widget
{
    public $categories;
    public $checked;
    public $options;

    protected function renderParams()
    {
        if ($this->checked === null) {
            $this->checked = [];
        }
        return [
            'categories' => $this->categories,
            'checked' => $this->checked,
            'options' => $this->options,
        ];
    }
}