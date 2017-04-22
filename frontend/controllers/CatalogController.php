<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use frontend\models\search\ProductSearch;
use frontend\models\Product;


class CatalogController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        $dataDisplay = Yii::$app->dataDisplay->route($this->route);
        $params = Yii::$app->request->get();
        $searchModel = new ProductSearch([
            'perPage' => $dataDisplay->perPage,
            'sortBy' => $dataDisplay->order,
        ]);
        $dataProvider = $searchModel->load($params)
            ->load($params, '')
            ->search()
        ;

        return $this->render('index', [
            'search' => $searchModel,
            'products' => $dataProvider->models,
            'pages' => $dataProvider->pagination,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionView($slug)
    {
        $product = Product::find()->published()->where(['slug' => $slug])->one();
        if (!$product) {
            throw new NotFoundHttpException();
        }
        return $this->render('view', [
            'model' => $product
        ]);
    }
}