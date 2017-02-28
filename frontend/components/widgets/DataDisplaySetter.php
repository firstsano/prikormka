<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 11.02.17
 * Time: 19:29
 */

namespace frontend\components\widgets;

use yii\helpers\ArrayHelper;

class DataDisplaySetter extends \frontend\components\extensions\Widget
{
    public $route;
    public $options;

    protected function renderParams()
    {
        $this->options = ArrayHelper::merge(
            $this->defaultOptions(),
            $this->options
        );
        return [
            'route' => $this->route,
            'sortOptions' => $this->options['sort'],
            'paginationOptions' => $this->options['pagination']
        ];
    }

    private function defaultOptions()
    {
        return [
            'sort' => [
                'name' => 'sort-by',
                'selected' => null,
                'options' => [],
                'htmlOptions' => []
            ],
            'pagination' => [
                'name' => 'per-page',
                'selected' => null,
                'options' => [],
                'htmlOptions' => []
            ]
        ];
    }
}