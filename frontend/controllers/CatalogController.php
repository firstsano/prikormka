<?php


namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Product;


class CatalogController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'products' => Product::find()->all(),
            'sortOptions' => $this->sortOptions(),
            'paginationOptions' => [15, 30, 50]
        ]);
    }

    /**
     * @inheritdoc
     */
    protected function sortOptions()
    {
        $sortOptions = [];
        $options = ['no', 'price', 'title', 'category'];
        foreach ($options as $option) {
            $sortOptions[$option] = Yii::t('frontend/site', 'selector.' . $option);
        }
        return $sortOptions;
    }
}