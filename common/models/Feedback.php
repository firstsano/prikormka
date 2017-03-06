<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use trntv\filekit\behaviors\UploadBehavior;

/**
 * This is the model class for table "feedbacks".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property string $body
 * @property string $user_name
 * @property string $user_prof
 *
 * @property User $user
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @var array
     */
    public $thumbnail;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'thumbnail',
                'pathAttribute' => 'thumbnail_path',
                'baseUrlAttribute' => 'thumbnail_base_url'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedbacks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body', 'thumbnail', 'user_name', 'user_prof'], 'required'],
            [['body'], 'string'],
            [['user_name', 'user_prof'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/models/feedback', 'ID'),
            'user_id' => Yii::t('common/models/feedback', 'User ID'),
            'thumbnail' => Yii::t('common/models/feedback', 'Thumbnail'),
            'body' => Yii::t('common/models/feedback', 'Body'),
            'user_name' => Yii::t('common/models/feedback', 'User Name'),
            'user_prof' => Yii::t('common/models/feedback', 'User Prof'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getImageUrl()
    {
        return $this->thumbnail_base_url . DIRECTORY_SEPARATOR . $this->thumbnail_path;
    }

    /**
     * @inheritdoc
     */
    public function getSimpleBody()
    {
        return strip_tags($this->body);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\FeedbackQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\FeedbackQuery(get_called_class());
    }
}
