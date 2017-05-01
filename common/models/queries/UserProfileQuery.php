<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\UserProfile]].
 *
 * @see \common\models\Order
 */
class UserProfileQuery extends \yii\db\ActiveQuery
{
    public $type;
    public $tableName;

    /**
     * @inheritdoc
     */
    public function prepare($builder)
    {
        if ($this->type !== null) {
            $this->andWhere(["$this->tableName.type" => $this->type]);
        }
        return parent::prepare($builder);
    }
}
