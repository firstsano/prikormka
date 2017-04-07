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
use yii\grid\GridView;
use kop\y2sp\ScrollPager;
use frontend\components\widgets\RememberThisPage;
use frontend\components\widgets\OrderNotice;

$this->title = Yii::t('frontend/site', 'Wholesale catalog');
$this->params['breadcrumbs'][] = $this->title;

?>

<?= RememberThisPage::widget() ?>
<?= ToTop::widget() ?>

<div class="site-wholesale">
    <h1 class="site-wholesale__title"><?= Html::encode($this->title) ?></h1>
    <?= OrderNotice::widget() ?>
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
