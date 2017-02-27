<?php

/* @var $this yii\web\View */
/* @var $model common\models\WidgetCarouselItem */
/* @var $form yii\bootstrap\ActiveForm */

use \common\models\WidgetCarouselItem;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<div class="widget-carousel-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model) ?>

    <?php echo $form->field($model, 'image')->widget(
        \trntv\filekit\widget\Upload::className(),
        [
            'url'=>['/file-storage/upload'],
        ]
    ) ?>

    <?php echo $form->field($model, 'order')->textInput() ?>

    <?php echo $form->field($model, 'url')->textInput(['maxlength' => 1024]) ?>

    <?php echo $form->field($model, 'caption')->widget(
        \yii\imperavi\Widget::className(),
        [
            'plugins' => ['fullscreen', 'fontcolor', 'video'],
            'options'=>[
                'minHeight'=>100,
                'maxHeight'=>100,
                'buttonSource'=>true,
                'convertDivs'=>false,
                'removeEmptyTags'=>false
            ]
        ]) ?>

    <?php echo $form->field($model, 'promo')->widget(
        \yii\imperavi\Widget::className(),
        [
            'plugins' => ['fullscreen', 'fontcolor', 'video'],
            'options'=>[
                'minHeight'=>100,
                'maxHeight'=>100,
                'buttonSource'=>true,
                'convertDivs'=>false,
                'removeEmptyTags'=>false
            ]
        ]) ?>

    <?php echo $form->field($model, 'status')->dropDownList(WidgetCarouselItem::statuses()) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
