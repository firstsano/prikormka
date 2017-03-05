<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Article;
use yii\web\NotFoundHttpException;

class NewsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'news' => Article::find()->published()->all()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id)
        ]);
    }

    /**
     * @param $id
     * @return $this
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        $model = Article::find()->published()->where(['id' => $id])->one();
        if (!$model) {
            throw new NotFoundHttpException();
        }
        return $model;
    }
}