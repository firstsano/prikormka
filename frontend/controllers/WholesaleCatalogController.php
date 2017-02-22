<?php


namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\search\ProductSearch;
use common\models\Category;
use frontend\components\extensions\ArrayHelper;


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
        $searchModel->filterCategory = @$request->get('category');
        $dataProvider = $searchModel
            ->load($request->get(), '')
            ->load($request->post(), '')
            ->search()
        ;

        if ($request->isAjax) {
            return $this->renderPartial('index', [
                'search' => $searchModel,
                'products' => $dataProvider->models,
                'pages' => $dataProvider->pagination,
                'categories' => ArrayHelper::mapRecursive(
                    Category::find()->root()->all(),
                    'slug',
                    'name',
                    'categories'
                )
            ]);
        }

        return $this->render('index', [
            'search' => $searchModel,
            'products' => $dataProvider->models,
            'pages' => $dataProvider->pagination,
            'categories' => ArrayHelper::mapRecursive(
                Category::find()->root()->all(),
                'slug',
                'name',
                'categories'
            )
        ]);
    }
}