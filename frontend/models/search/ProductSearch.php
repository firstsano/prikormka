<?php

namespace frontend\models\search;

use Yii;
use yii\data\ActiveDataProvider;
use frontend\models\Product;

class ProductSearch extends Product
{
    /**
     * @var int
     */
    public $perPage = 15;
    /**
     * @var string
     */
    public $sortBy = 'name';
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
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['seasons', 'each', 'rule' => [
                'in', 'range' => array_keys(static::seasons())]
            ],
            ['perPage', 'in', 'range' => static::perPageOptions()],
            [['priceMin', 'priceMax'], 'number'],
            ['priceMax', 'compare', 'compareAttribute' => 'priceMin',
                'operator' => '>=', 'type' => 'number'],
            ['sortBy', 'in', 'range' => array_keys(static::sortByOptions())]
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

        $query->andFilterWhere(['in', 'season', $this->seasons]);
        $query->andFilterWhere(['>=', 'price', $this->priceMin]);
        $query->andFilterWhere(['<=', 'price', $this->priceMax]);


        return $dataProvider;
    }

    public function load($data, $formName = null)
    {
        parent::load($data, $formName);
        return $this;
    }

    public static function perPageOptions()
    {
        $perPage = [1, 15, 30, 50];
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
