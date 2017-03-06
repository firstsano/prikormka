<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\Order]].
 *
 * @see \common\models\Order
 */
class FeedbackQuery extends \yii\db\ActiveQuery
{
    const DEFAULT_LIMIT = 8;
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     */
    public function newOnes($limit = self::DEFAULT_LIMIT)
    {
        $this->addOrderBy(['created_at' => SORT_DESC])->limit($limit);
        return $this;
    }

    /**
     * @inheritdoc
     * @return \common\models\Order[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Order|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
