<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 18.01.17
 * Time: 21:12
 */

namespace frontend\components\widgets;

use frontend\components\extensions\Html;

class ProductQuickOrder extends \frontend\components\extensions\Widget
{
    public $product;
    public $options;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, ['q-order']);
    }

    /**
     * @inheritdoc
     */
    protected function renderParams()
    {
        return [
            'product' => $this->product,
            'options' => $this->options
        ];
    }
}