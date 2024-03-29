<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->getPublicIdentity();
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'email:email',
            'status',
            'created_at:datetime',
            'updated_at:datetime',
            'logged_at:datetime',
            'userAdditionalInfo.client_type',
            'userAdditionalInfo.company_name',
            'userAdditionalInfo.inn',
            'userAdditionalInfo.kpp',
            'userAdditionalInfo.company_address',
            'userAdditionalInfo.signer_name',
            'userAdditionalInfo.bik',
            'userAdditionalInfo.checking_account',
            'userAdditionalInfo.bank_name',
            'userAdditionalInfo.cor_account',
            'userAdditionalInfo.bank_city',
            'userAdditionalInfo.ogrnip',
            'userAdditionalInfo.series',
            'userAdditionalInfo.number',
            [
                'attribute' => 'userAdditionalInfo.receive_date',
                'value' => (@$model->userAdditionalInfo->receive_date) ? Yii::$app->formatter->asDate($model->userAdditionalInfo->receive_date) : ""
            ]
        ],
    ]) ?>

</div>
