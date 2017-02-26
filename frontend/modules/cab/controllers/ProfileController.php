<?php

namespace frontend\modules\cab\controllers;

use Yii;
use yii\web\Controller;
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
        $model->save();
        return $this->redirect(['view']);
    }
}