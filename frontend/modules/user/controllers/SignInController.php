<?php

namespace frontend\modules\user\controllers;

use common\commands\SendEmailCommand;
use common\models\User;
use common\models\UserToken;
use frontend\modules\user\models\LoginForm;
use frontend\modules\user\models\PasswordResetRequestForm;
use frontend\modules\user\models\ResetPasswordForm;
use frontend\modules\user\models\SignupForm;
use Yii;
use yii\base\Exception;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * Class SignInController
 * @package frontend\modules\user\controllers
 * @author Eugene Terentev <eugene@terentev.net>
 */
class SignInController extends \yii\web\Controller
{

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            'signup', 'login', 'request-password-reset', 'reset-password', 'activation'
                        ],
                        'allow' => true,
                        'roles' => ['?']
                    ],
                    [
                        'actions' => [
                            'signup', 'login', 'request-password-reset', 'reset-password', 'activation'
                        ],
                        'allow' => false,
                        'roles' => ['@'],
                        'denyCallback' => function () {
                            return $this->goHome();
                        }
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post']
                ]
            ]
        ];
    }

    /**
     * @return array|string|Response
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        if (Yii::$app->request->isAjax) {
            $model->load($_POST);
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model
            ]);
        }
    }

    /**
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * @return string|Response
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            $user = $model->signup();
            if ($user) {
                if ($model->shouldBeActivated()) {
                    Yii::$app->session->setFlash('success', [
                        'type' => 'success',
                        'title' => Yii::t('frontend/site', 'verify.title'),
                        'message' => Yii::t('frontend/site', 'verify.message'),
                    ]);
                } else {
                    Yii::$app->getUser()->login($user);
                }
                return $this->goHome();
            }
        }

        return $this->render('signup', [
            'model' => $model
        ]);
    }

    public function actionActivation($token)
    {
        $token = UserToken::find()
            ->byType(UserToken::TYPE_ACTIVATION)
            ->byToken($token)
            ->notExpired()
            ->one();

        if (!$token) {
            throw new BadRequestHttpException;
        }

        $user = $token->user;
        $user->updateAttributes([
            'status' => User::STATUS_ACTIVE
        ]);
        $token->delete();
        Yii::$app->user->login($user);
        Yii::$app->session->setFlash('success', [
            'type' => 'success',
            'title' => Yii::t('frontend/site', 'activated.title'),
            'message' => Yii::t('frontend/site', 'activated.message'),
        ]);

        return $this->goHome();
    }

    /**
     * @return string|Response
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('alert', [
                    'type' => 'info',
                    'title' => Yii::t('frontend/site', 'reset-password.title'),
                    'message' => Yii::t('frontend/site', 'reset-password.message'),
                ]);

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('alert', [
                    'type' => 'info',
                    'title' => Yii::t('frontend/site', 'reset-password.title'),
                    'message' => Yii::t('frontend/site', 'reset-password-error.message'),
                ]);
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * @param $token
     * @return string|Response
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', [
                'type' => 'success',
                'title' => Yii::t('frontend/site', 'reset-password.title'),
                'message' => Yii::t('frontend/site', 'reset-password-success.message'),
            ]);
            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
