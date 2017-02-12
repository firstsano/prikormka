<?php

use trntv\filekit\widget\Upload;
use common\models\Product;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $categories common\models\Category[] */

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'slug')
        ->hint(Yii::t('backend', 'If you\'ll leave this field empty, slug will be generated automatically'))
        ->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(
        $categories,
        'id',
        'name'
    ), ['prompt'=>'']) ?>

    <?php echo $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="row">
        <div class="col-xs-3">
            <?= $form->field($model, 'weight')->textInput() ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'price')->textInput() ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'pack_quantity')->textInput() ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'min_pack_quantity')->textInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'status')->dropDownlist(Product::statuses()) ?>

    <?= $form->field($model, 'seasonality')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'images')
        ->hint(Yii::t('backend/models/product', 'product.images.hint'))
        ->widget(
            Upload::className(),
            [
                'url' => ['/file-storage/upload'],
                'sortable' => true,
                'maxFileSize' => 10000000, // 10 MiB
                'maxNumberOfFiles' => 10
            ]
        ) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ?
            Yii::t('common/actions', 'Create') :
            Yii::t('common/actions', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
