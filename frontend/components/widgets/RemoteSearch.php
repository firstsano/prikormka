<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 19.02.17
 * Time: 17:02
 */

namespace frontend\components\widgets;


class RemoteSearch extends \frontend\components\extensions\Widget
{
    /**
     * @var string
     */
    public $value;

    /**
     * @return string
     */
    public $container;

    protected function renderParams()
    {
        return [
            'value' => $this->value,
            'container' => $this->container
        ];
    }
}