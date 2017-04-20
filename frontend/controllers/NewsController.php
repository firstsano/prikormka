<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Article;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;

class NewsController extends Controller
{
    const NEWS_PER_PAGE = 10;

    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()->published(),
            'pagination' => [
                'pageSize' => static::NEWS_PER_PAGE,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionView($slug)
    {
        return $this->render('view', [
            'model' => $this->findModel($slug)
        ]);
    }

    /**
     * @param $id
     * @return $this
     * @throws NotFoundHttpException
     */
    protected function findModel($slug)
    {
        $model = Article::find()->published()->where(['slug' => $slug])->one();
        if (!$model) {
            throw new NotFoundHttpException();
        }
        return $model;
    }
}