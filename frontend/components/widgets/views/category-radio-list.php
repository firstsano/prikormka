<?php

/* @var $this \yii\web\View */
/* @var $categories \common\models\Category */
/* @var $checked string */

use frontend\components\extensions\Html;

\frontend\components\widgets\assets\CategoryRadioListAsset::register($this);

?>

<div class="category-radio-list">
    <?php foreach ($categories as $category) {
        $id = "category-{$category->slug}";
        echo Html::radio('category', ($category->slug == @$checked), [
            'id' => $id,
            'value' => $category->slug,
            'class' => 'category-radio-list__radio'
        ]);
        echo Html::label(
            $category->name,
            $id,
            ['class' => 'category-radio-list__label']
        );
        if (!empty($category->subCategories)) {
            echo Html::tag(
                'div',
                $this->render('category-radio-list', [
                    'checked' => $checked,
                    'categories' => $category->subCategories
                ]),
                ['class' => 'category-radio-list__sub-categories']
            );
        }
    } ?>
</div>

