<?php

/* @var $this yii\web\View */
/* @var $model common\models\Order */

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Order;

$this->title = Yii::t('backend\site', 'Order {number}', ['number' => $model->id]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend\site', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <p>
        <?= Html::a(Yii::t('backend\site', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend\site', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend\site', 'delete-item.confirm'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php

        $attributes = [
            [
                'attribute' => 'total',
                'value' => format_currency($model->total)
            ],
            [
                'attribute' => 'status',
                'value' => Order::statuses()[$model->status]
            ],
            'comment:ntext',
            [
                'attribute' => 'delivery',
                'value' => Order::deliveries()[$model->delivery]
            ],
            [
                'attribute' => 'client_type',
                'value' => Yii::t('common/models/order', $model->client_type)
            ],
            [
                'attribute' => 'orderUserInfo',
                'format' => 'raw',
                'value' => $this->render('_user-info', ['model' => $model->orderUserInfo])
            ],
        ];

        if (isset($model->orderCompanyInfo))  {
            $attributes = array_merge(
                $attributes,
                [
                    [
                        'attribute' => 'orderCompanyInfo',
                        'format' => 'raw',
                        'value' => $this->render('_company-info', ['model' => $model->orderCompanyInfo])
                    ]
                ]
            );
        }

        if (isset($model->orderRegistrationInfo))  {
            $attributes = array_merge(
                $attributes,
                [
                    [
                        'attribute' => 'orderRegistrationInfo',
                        'format' => 'raw',
                        'value' => $this->render('_registration-info', ['model' => $model->orderRegistrationInfo])
                    ]
                ]
            );
        }

        $attributes = array_merge(
            $attributes,
            [
                [
                    'attribute' => 'created_at',
                    'format' => 'raw',
                    'value' => Yii::$app->formatter->asDatetime($model->created_at)
                ],
                [
                    'attribute' => 'updated_at',
                    'format' => 'raw',
                    'value' => Yii::$app->formatter->asDatetime($model->updated_at)
                ],
                [
                    'attribute' => 'orderProducts',
                    'format' => 'raw',
                    'value' => $this->render('_orderProducts', ['model' => $model])
                ],
            ]
        );

        echo DetailView::widget([
            'model' => $model,
            'template' => "<tr><th width='10%'>{label}</th><td>{value}</td></tr>",
            'attributes' => $attributes
        ])
    ?>
</div>
