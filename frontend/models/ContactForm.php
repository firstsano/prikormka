<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\commands\SendEmailCommand;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'body'], 'required'],
            // We need to sanitize them
            [['name', 'body'], 'filter', 'filter' => 'strip_tags'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
//            ['verifyCode', 'captcha'],

        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('frontend/models/contact-form', 'Name'),
            'email' => Yii::t('frontend/models/contact-form', 'Email'),
            'subject' => Yii::t('frontend/models/contact-form', 'Subject'),
            'body' => Yii::t('frontend/models/contact-form', 'Body'),
            'verifyCode' => Yii::t('frontend/models/contact-form', 'Verification Code')
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @return boolean whether the model passes validation
     */
    public function contact()
    {
        if ($this->validate()) {
            return Yii::$app->commandBus->handle(new SendEmailCommand([
                'to' => Yii::$app->params['contactEmails'],
                'subject' => Yii::t('frontend/site', 'mail-contact.subject'),
                'from' => [$this->email => $this->name],
                'body' => $this->body,
            ]));
        } else {
            return false;
        }
    }
}
