<?php

use trntv\filekit\widget\Upload;
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

    <?php echo $form->field($model, 'price')->textInput() ?>

    <?php echo $form->field($model, 'weight')->textInput() ?>

    <?php echo $form->field($model, 'pack_quantity')->textInput() ?>

    <?php echo $form->field($model, 'min_pack_quantity')->textInput() ?>

    <?php echo $form->field($model, 'seasonality')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'images')->widget(
        Upload::className(),
        [
            'url' => ['/file-storage/upload'],
            'sortable' => true,
            'maxFileSize' => 10000000, // 10 MiB
            'maxNumberOfFiles' => 10
        ]
    ) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
