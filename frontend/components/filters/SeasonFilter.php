<?php

namespace frontend\components\filters;

use yii\base\Object;
use frontend\models\queries\ProductQuery;
use yii\helpers\ArrayHelper;

class SeasonFilter extends Object implements FilterInterface
{
    /**
     * @var array
     */
    public $request = [];

    /**
     * @inheritdoc
     */
    public function apply(ProductQuery $query)
    {
        if (isset($this->requestValue)) {
            $query->andWhere(['season' => $this->requestValue]);
        }
    }

    public function getRequestValue()
    {
        return ArrayHelper::getValue($this->request, 'season', null);
    }
}