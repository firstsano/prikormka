<?php

/* @var $this \yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $pages array */
/* @var $products \common\models\Product[] */
/* @var $search \frontend\models\search\ProductSearch */
/* @var $categories array */

use yii\widgets\Pjax;
use frontend\components\widgets\WholesaleFilter;
use frontend\components\widgets\ProductWholesaleOrder;
use frontend\components\extensions\Html;
use frontend\components\widgets\FlashMessages;
use frontend\components\widgets\ToTop;
use yii\helpers\Url;
use yii\grid\GridView;
use kop\y2sp\ScrollPager;
use frontend\components\widgets\RememberThisPage;

$this->title = Yii::t('frontend/site', 'Wholesale catalog');
$this->params['breadcrumbs'][] = $this->title;

?>

<?= RememberThisPage::widget() ?>
<?= ToTop::widget() ?>

<div class="site-wholesale">
    <h1 class="site-wholesale__title"><?= Html::encode($this->title) ?></h1>
    <div class="order-notice">
        <div class="order-notice__message-layout">
            <?= FlashMessages::widget([
                'messages' => [
                    [
                        'title' => 'Уважаемый покупатель!',
                        'message' => "Обращаем ваше внимание, что минимальная сумма общего заказа " .
                            "должна быть не меньше 20 000 руб."
                    ]
                ],
                'options' => ['class' => 'order-notice__message']
            ]) ?>
        </div>
        <div class="order-notice__excel-price">
            <?= Html::beginTag('a', [
                'href' => Url::to(['/site/download', 'path' => 'files/price.xls']),
                'class' => 'order-notice__excel-link'])
            ?>
            <div class="order-notice__excel-info">Скачать прайс-лист<br /> в формате Excel</div>
            <?= Html::img('@img/icons/excel.png', ['class' => 'order-notice__excel-img']) ?>
            <?= Html::endTag('a') ?>
        </div>
    </div>
    <br />
    <div class="site-wholesale__layout">
        <?php Pjax::begin([
            'id' => 'wholesale-products',
            'enablePushState' => false,
            'clientOptions' => [
                'fragment' => '.site-wholesale__products',
                'container' => '.site-wholesale__products',
            ]
        ]) ?>
        <div class="site-wholesale__filter">
            <?= WholesaleFilter::widget([
                'model' => $search,
                'params' => Yii::$app->request->get()
            ]) ?>
        </div>
        <div class="site-wholesale__products">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'headerRowOptions' => [
                    'class' => 'simple-grid__header'
                ],
                'tableOptions' => [
                    'class' => 'simple-grid__table'
                ],
                'options' => [
                    'class' => 'simple-grid'
                ],
                'rowOptions' => [
                    'class' => 'simple-grid__row'
                ],
                'layout' => "{items}{pager}",
                'columns' => [
                    [
                        'label' => false,
                        'format' => 'raw',
                        'value' => function($model) {
                            return ProductWholesaleOrder::widget([
                                'product' => $model
                            ]);
                        },
                        'contentOptions' => ['class' => 'simple-grid__cell'],
                    ]
                ],
                'emptyText' => FlashMessages::widget([
                    'messages' => [
                        [
                            'title' => 'Не найдено результатов...',
                            'message' => "К сожалению по вашему запросу не найдео результатов. <br />" .
                                "Попробуйте изменить критерии запроса."
                        ]
                    ]
                ]),
                'pager' => [
                    'class' => ScrollPager::className(),
                    'container' => '.simple-grid',
                    'item' => '.simple-grid__row',
                    'paginationSelector' => '.pagination',
                    'triggerOffset' => 1000,
                    'next' => '.next a',
                    'enabledExtensions' => [
                        ScrollPager::EXTENSION_TRIGGER,
                        ScrollPager::EXTENSION_SPINNER,
                        ScrollPager::EXTENSION_PAGING,
                    ],
                    'triggerTemplate' => '<tr class="ias-trigger"><td colspan="100%" style="text-align: center"><a style="cursor: pointer">{text}</a></td></tr>',
                ],
            ]) ?>
        </div>
        <?php Pjax::end() ?>
    </div>
</div>

<?php

$reinitializeScroll = <<<JS
    $('#wholesale-products').on('pjax:end', function() {
        jQuery.ias().reinitialize();
    });
JS;

$this->registerJs($reinitializeScroll, $this::POS_READY);
