<?php


namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\search\ProductSearch;


class WholesaleCatalogController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch([
            'scenario' => ProductSearch::SCENARIO_WHOLESALE
        ]);
        $params = Yii::$app->request->get();
        $dataProvider = $searchModel->load($params, '')->search();

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('index', [
                'search' => $searchModel,
                'products' => $dataProvider->models,
                'pages' => $dataProvider->pagination
            ]);
        }

        return $this->render('index', [
            'search' => $searchModel,
            'products' => $dataProvider->models,
            'pages' => $dataProvider->pagination
        ]);
    }
}