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
        $request = Yii::$app->request;
        $searchModel = new ProductSearch([
            'scenario' => ProductSearch::SCENARIO_WHOLESALE
        ]);
        $dataProvider = $searchModel
            ->load($request->get(), '')
            ->load($request->post(), '')
            ->search()
        ;

        return $this->render('index', [
            'search' => $searchModel,
            'products' => $dataProvider->models,
            'pages' => $dataProvider->pagination
        ]);
    }
}