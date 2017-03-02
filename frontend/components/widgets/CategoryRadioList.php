<?php

namespace frontend\components\widgets;

class CategoryRadioList extends \frontend\components\extensions\Widget
{
    public $categories;
    public $checked;

    protected function renderParams()
    {
        return [
            'checked' => $this->checked,
            'categories' => $this->categories
        ];
    }
}