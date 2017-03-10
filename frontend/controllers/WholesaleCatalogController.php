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
        $dataProvider = $searchModel
            ->load($request->get(), '')
            ->search()
        ;
        $renderParams = [
            'search' => $searchModel,
            'dataProvider' => $dataProvider,
            'pages' => $dataProvider->pagination,
            'categories' => $this->getFilterCategories()
        ];

        if ($request->isAjax) {
            return $this->renderPartial('index', $renderParams);
        }
        return $this->render('index', $renderParams);
    }

    /**
     * @inheritdoc
     */
    protected function getFilterCategories()
    {
        return ArrayHelper::mapRecursive(
            Category::find()->root()->all(),
            'slug',
            'name',
            'categories'
        );
    }
}