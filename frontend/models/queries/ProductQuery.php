<?php
/**
 * Created by PhpStorm.
 * User: riky
 * Date: 12.02.17
 * Time: 13:44
 */

namespace frontend\models\queries;

use common\models\queries\ProductQuery as BaseQuery;

class ProductQuery extends BaseQuery
{
    /**
     * @inheritdoc
     */
    public function sortBy($field)
    {
        if (in_array($field, static::sortableFields())) {
            $this->addOrderBy($this->sortableField($field));
        }
        return $this;
    }

    /**
     * @inheritdoc
     */
    public static function sortableFields()
    {
        return ['price', 'title'];
    }

    /**
     * @inheritdoc
     */
    private function sortableField($key)
    {
        return [
            'price' => 'price',
            'title' => 'name',
        ][$key];
    }
}