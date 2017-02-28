<?php


namespace frontend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
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
        $searchModel->filterCategories = @$params['categories'];
        $dataProvider = $searchModel->load($params)
            ->load($params, '')
            ->search()
        ;

        return $this->render('index', [
            'search' => $searchModel,
            'products' => $dataProvider->models,
            'pages' => $dataProvider->pagination
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => Product::find()->published()->where(['id' => $id])->one()
        ]);
    }

    protected function filterKeys()
    {
        return [
            'seasons', 'perPage', 'sortBy',
            'priceMin', 'priceMax', 'categories'
        ];
    }

    /**
     * @inheritdoc
     */
    protected function redirectWithFilters()
    {
        $mergedParams = array_merge(
            Yii::$app->request->get(),
            Yii::$app->request->post()
        );
        $params = [];
        foreach ($mergedParams as $key => $value) {
            if (in_array($key, $this->filterKeys())) {
                $params[$key] = $value;
            }
        }
        return $this->redirect(ArrayHelper::merge([''], $params));
    }
}