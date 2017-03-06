<?php

/* @var $this yii\web\View */
/* @var $model common\models\Feedback */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use trntv\filekit\widget\Upload;

?>

<div class="feedback-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'thumbnail')->widget(
        Upload::className(),
        [
            'url' => ['/file-storage/upload'],
            'maxFileSize' => 5000000, // 5 MiB
        ]);
    ?>

    <?php echo $form->field($model, 'body')->widget(
        \yii\imperavi\Widget::className(),
        [
            'plugins' => ['fontcolor'],
            'options' => [
                'minHeight' => 400,
                'maxHeight' => 400,
                'buttonSource' => true,
                'convertDivs' => false,
                'removeEmptyTags' => false,
                'imageUpload' => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
            ]
        ]
    ) ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_prof')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('common\actions', 'Create') : Yii::t('common\actions', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
