<?php

namespace frontend\components\extensions;

class Breadcrumbs extends \yii\widgets\Breadcrumbs
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->itemTemplate = "<li class=\"breadcrumbs__item\">" .
            "{link}" .
            Html::icon('remove', ['class' => 'breadcrumbs__separator']) .
            "</li>"
        ;
        $this->activeItemTemplate = "<li class=\"breadcrumbs__item breadcrumbs__item_active\">{link}</li>\n";
        Html::addCssClass($this->options, ['breadcrumbs']);
    }
}