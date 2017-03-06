<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Feedback;

class FeedbacksController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'feedbacks' => Feedback::find()->all()
        ]);
    }
}