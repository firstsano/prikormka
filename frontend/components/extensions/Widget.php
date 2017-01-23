<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 18.01.17
 * Time: 18:55
 */

namespace frontend\components\extensions;

class Widget extends \yii\base\Widget
{
    public function run()
    {
        $className = get_base_class_name($this);
        $render = camelcase_to_snake_case($className);
        return $this->render($render, $this->renderParams());
    }

    protected function renderParams()
    {
        return [];
    }
}