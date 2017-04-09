<?php

/* @var $this \yii\web\View */
/* @var $categories \common\models\Category[] */
/* @var $checked array */
/* @var $options array */


use frontend\components\extensions\Html;

?>

<div class="category-checkbox-list">
    <?php foreach ($categories as $category) {
        $id = "category-{$category->slug}";
        echo Html::checkbox('categories[]', in_array($category->id, $checked), [
            'id' => $id,
            'value' => $category->id,
            'class' => 'category-checkbox-list__checkbox filled-in'
        ]);
        Html::addCssClass($options['label'], ['category-checkbox-list__label']);
        echo Html::label($category->name, $id, $options['label']);
        if (!empty($category->subCategories)) {
            echo Html::tag(
                'div',
                $this->render('categories-checkbox-list', [
                    'checked' => $checked,
                    'options' => $options,
                    'categories' => $category->subCategories
                ]),
                ['class' => 'category-checkbox-list__sub-categories']
            );
        }
    } ?>
</div>

