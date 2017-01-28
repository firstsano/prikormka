<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\Product]].
 *
 * @see \common\models\Product
 */
class ProductQuery extends \yii\db\ActiveQuery
{
    const NEW_LIMIT = 6;
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     */
    public function newOnes($limit = self::NEW_LIMIT)
    {
        $this
            ->addOrderBy(['created_at' => SORT_DESC])
            ->limit($limit)
        ;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function bestOffers()
    {
        return $this;
    }

    /**
     * @inheritdoc
     * @return \common\models\Product[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Product|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
