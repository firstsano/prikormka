<?php

namespace frontend\models\search;

use common\models\Category;
use frontend\components\extensions\ArrayHelper;
use Yii;
use yii\data\ActiveDataProvider;
use frontend\models\Product;

class ProductSearch extends Product
{
    const SCENARIO_SIMPLE = 'simple';
    const SCENARIO_WHOLESALE = 'wholesale';

    const WHOLESALE_PER_PAGE = 20;

    /**
     * @var int
     */
    public $perPage;
    /**
     * @var string
     */
    public $sortBy;
    /**
     * @var float
     */
    public $priceMin;
    /**
     * @var float
     */
    public $priceMax;
    /**
     * @var array
     */
    public $seasons = [];
    /**
     * @var array
     */
    public $filterCategories = [];
    /**
     * @var string
     */
    public $filter;
    /**
     * @var string
     */
    public $filterCategory;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // Simple Scenario
            [['seasons'], 'each', 'rule' => [
                'in', 'range' => array_keys(static::seasons())
            ], 'on' => [static::SCENARIO_SIMPLE, static::SCENARIO_DEFAULT]],
            [['perPage'], 'in', 'range' => static::perPageOptions(), 'on' => [static::SCENARIO_SIMPLE, static::SCENARIO_DEFAULT]],
            [['priceMin', 'priceMax'], 'number', 'on' => [static::SCENARIO_SIMPLE, static::SCENARIO_DEFAULT]],
            ['priceMax', 'compare', 'compareAttribute' => 'priceMin',
                'operator' => '>=', 'type' => 'number', 'on' => [static::SCENARIO_SIMPLE, static::SCENARIO_DEFAULT]],
            ['sortBy', 'in', 'range' => array_keys(static::sortByOptions()), 'on' => [static::SCENARIO_SIMPLE, static::SCENARIO_DEFAULT]],

            // Wholesale Scenario
            [['filter'], 'string', 'on' => static::SCENARIO_WHOLESALE]
        ];
    }

    /**
     * Creates data provider instance with search query applied
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search()
    {
        if (!$this->validate()) {
            return new ActiveDataProvider([]);
        }

        switch ($this->scenario) {
            case static::SCENARIO_SIMPLE:
                return $this->simpleSearch();
            case static::SCENARIO_WHOLESALE:
                return $this->wholesaleSearch();
            default:
                return $this->simpleSearch();
        }
    }

    public function simpleSearch()
    {
        $query = Product::find()->published();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSizeParam' => 'perPage',
                'pageSize' => $this->perPage,
            ],
            'sort' => [
                'defaultOrder' => [
                    $this->sortBy => SORT_ASC,
                ]
            ],
        ]);

        $query->innerJoin(Category::tableName(),
            Product::tableName() . ".category_id = " . Category::tableName() . ".id"
        );
        $query->andFilterWhere(['in', 'season', $this->seasons]);
        $query->andFilterWhere(['in', Category::tableName() . '.slug', $this->filterCategories]);
        $query->andFilterWhere(['>=', 'price', $this->priceMin]);
        $query->andFilterWhere(['<=', 'price', $this->priceMax]);

        return $dataProvider;
    }

    public function wholesaleSearch()
    {
        $query = Product::find()->published();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSizeParam' => 'perPage',
                'pageSize' => static::WHOLESALE_PER_PAGE,
            ],
            'sort' => [
                'defaultOrder' => [
                    $this->sortBy => SORT_ASC,
                ]
            ],
        ]);

        $category = Category::find()
            ->where(['slug' => $this->filterCategory])
            ->one()
        ;
        if ($category) {
            $query->andFilterWhere(['in', 'category_id', $category->treeIds]);
        }

//        $query->innerJoin(
//            Category::tableName(),
//            Product::tableName() . ".category_id = " .
//                Category::tableName() . ".id"
//        );

        $query->andFilterWhere([
            'or',
            ['like', 'name', $this->filter],
            ['like', 'description', $this->filter],
            ['like', 'slug', $this->filter],
        ]);

//        $query->andFilterWhere([
//            Category::tableName() . '.slug' => $this->filterCategory
//        ]);

        return $dataProvider;
    }

    public function load($data, $formName = null)
    {
        parent::load($data, $formName);
        $this->setDefaults();
        return $this;
    }

    public function setDefaults()
    {
        if (!$this->perPage) {
            $this->perPage = 15;
        }
        if (!$this->sortBy) {
            $this->sortBy = 'name';
        }
    }

    public static function perPageOptions()
    {
        $perPage = [15, 30, 50];
        return array_combine($perPage, $perPage);
    }

    public static function sortByOptions()
    {
        $sortBy = ['name', 'price'];
        $sortByValues = [];
        foreach ($sortBy as $attr) {
            $sortByValues[$attr] =
                Yii::t('frontend/models/product-search', "sort.$attr");
        }
        return $sortByValues;
    }
}
