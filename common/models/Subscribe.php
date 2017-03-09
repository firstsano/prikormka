<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subscribes".
 *
 * @property integer $id
 * @property string $email
 */
class Subscribe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscribes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['email'], 'email'],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/models/subscribe', 'ID'),
            'email' => Yii::t('common/models/subscribe', 'Email'),
        ];
    }
}
