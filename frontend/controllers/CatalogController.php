<?php


namespace frontend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\data\Pagination;
use frontend\models\Product;
use frontend\models\queries\ProductQuery;


class CatalogController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        if (Yii::$app->request->post()) {
            $this->redirectWithFilters();
        }
        $perPage = Yii::$app->request->get('per-page', 15);
        $sortBy = Yii::$app->request->get('sort-by', 'no');
        $query = Product::find()->published()->sortBy($sortBy);

        $countQuery = clone $query;
        $pages = new Pagination([
            'pageSize' => $perPage,
            'totalCount' => $countQuery->count()
        ]);
        $products = $query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all()
        ;

        return $this->render('index',
            ArrayHelper::merge([
                'products' => $products,
                'pages' => $pages
            ], $this->dataParams())
        );
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

    /**
     * @inheritdoc
     */
    protected function redirectWithFilters()
    {
        return $this->redirect(
            ArrayHelper::merge(
                [''],
                $this->filterKeys(Yii::$app->request->get()),
                $this->filterKeys(Yii::$app->request->post())
            )
        );
    }

    /**
     * @inheritdoc
     */
    protected function filterKeys($array)
    {
        $filterKeys = ['per-page', 'sort-by'];
        return array_intersect_key(
            $array,
            array_flip($filterKeys)
        );
    }

    /**
     * @inheritdoc
     */
    protected function dataParams()
    {
        $sortOptions = $this->sortOptions();
        $paginationOptions = $this->paginationOptions();
        $perPage = Yii::$app->request->get('per-page',
            array_keys($sortOptions)[0]);
        $sortBy = Yii::$app->request->get('sort-by',
            array_keys($paginationOptions)[0]);
        return [
            'sortOptions' => [
                'selected' => $sortBy,
                'collection' => $sortOptions
            ],
            'paginationOptions' => [
                'selected' => $perPage,
                'collection' => $paginationOptions
            ]
        ];
    }

    protected function paginationOptions()
    {
        $values = [1, 15, 30, 50];
        return array_combine($values, $values);
    }

    /**
     * @inheritdoc
     */
    protected function sortOptions()
    {
        $sortOptions = [];
        $options = ArrayHelper::merge(['no'], ProductQuery::sortableFields());
        foreach ($options as $option) {
            $sortOptions[$option] = Yii::t('frontend/site', 'selector.' . $option);
        }
        return $sortOptions;
    }
}