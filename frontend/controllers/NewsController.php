<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Article;

class NewsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'news' => Article::find()->published()->news()->all()
        ]);
    }
}