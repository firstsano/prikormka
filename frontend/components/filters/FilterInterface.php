<?php

namespace frontend\components\filters;

use frontend\models\queries\ProductQuery;

interface FilterInterface
{
    public function apply(ProductQuery $query);
}