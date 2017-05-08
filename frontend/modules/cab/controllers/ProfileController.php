<?php

namespace frontend\modules\cab\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use frontend\modules\cab\models\ProfileForm;
use yii\filters\AccessControl;

class ProfileController extends Controller
{
    public $defaultAction = 'view';
    public $layout = 'cab';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'update' => ['put'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function actionView()
    {
        return $this->render('view', [
            'model' => Yii::$app->user->identity
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionEdit()
    {
        $model = new ProfileForm();
        $model->loadProfile(Yii::$app->user->identity->userProfile);
        return $this->render('edit', [
            'model' => $model
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionUpdate()
    {
        $model = new ProfileForm();
        if (!$model->load(Yii::$app->request->post())) {
            throw new BadRequestHttpException();
        }
        if (!$model->validate()) {
            return $this->render('edit', [
                'model' => $model
            ]);
        }
        $model->user = Yii::$app->user->identity;
        $userAdditionalInfo = $model->user->getOrGenerateUserAdditionalInfo();
        $attributes = ['company_name', 'client_type', 'inn', 'kpp', 'company_address',
            'signer_name', 'bik', 'checking_account', 'bank_name', 'cor_account', 'bank_city',
            'ogrnip', 'series', 'number', 'receive_date'];
        foreach($attributes as $attribute) {
            $userAdditionalInfo->$attribute = $model->$attribute;
        }
        $userAdditionalInfo->save();
        $model->save();
        return $this->redirect(['view']);
    }
}