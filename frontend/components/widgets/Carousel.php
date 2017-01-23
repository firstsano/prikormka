<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 19.01.17
 * Time: 13:43
 */

namespace frontend\components\widgets;

use yii\base\Exception;


class Carousel extends \frontend\components\extensions\Widget
{
    public $items;

    public function init()
    {
        if (empty($this->items)) {
            throw new Exception('Carousel must contain at least 1 item');
        }
        parent::init();
    }

    protected function renderParams()
    {
        return [
            'items' => $this->items
        ];
    }
}