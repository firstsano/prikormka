<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $slug
 * @property string $description
 *
 * @property Category $parent
 * @property Category[] $categories
 * @property Products[] $products
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%categories}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'required'],
            [['description'], 'string'],
            [['name', 'slug'], 'string', 'max' => 255],
            ['slug', 'unique'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/models/category', 'ID'),
            'parent_id' => Yii::t('common/models/category', 'Parent'),
            'name' => Yii::t('common/models/category', 'Name'),
            'slug' => Yii::t('common/models/category', 'Slug'),
            'description' => Yii::t('common/models/category', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['parent_id' => 'id']);
    }

    public function getSubCategories()
    {
        return $this->getCategories();
    }

    public function getCategoriesIds()
    {
        return $this->getCategories()->select('id')->column();
    }

    public static function filters()
    {
        return static::find()
            ->orderBy('name')
            ->with('subCategories')
            ->root()
            ->all()
        ;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function getSubcategoriesIds()
    {
        $allCategories = static::find()->all();
        $oldCategoriesIds = [];
        $newCategoriesIds = $this->categoriesIds;
        while(!empty(array_diff($newCategoriesIds, $oldCategoriesIds))) {
            $oldCategoriesIds = array_merge($oldCategoriesIds, $newCategoriesIds);
            $children = array_filter($allCategories, function($category) use($newCategoriesIds) {
                return in_array($category->parent_id, $newCategoriesIds);
            });
            $childrenIds = array_map(function($category) { return $category->id; }, $children);
            $newCategoriesIds = array_merge($newCategoriesIds, $childrenIds);
        }
        return array_unique($oldCategoriesIds);
    }

    /**
     * @inheritdoc
     */
    public function getTreeIds()
    {
        return array_merge([$this->id], $this->subcategoriesIds);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\CategoryQuery(get_called_class());
    }
}
