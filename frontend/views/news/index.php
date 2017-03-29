<?php

/* @var $this \yii\web\View */
/* @var $news \common\models\Article[] */

use frontend\components\extensions\Html;
use frontend\components\widgets\FlashMessages;
use kop\y2sp\ScrollPager;
use yii\grid\GridView;
use frontend\components\extensions\Url;

$this->title = Yii::t('frontend/site', 'Blog');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="news-index">
    <h1 class="news-index__title"><?= $this->title ?></h1>
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
                    $cell = '<hr />';
                    $cell .= "<div class=\"news-index__item\">";
                    $cell .= "<div class=\"news-index__item-thumbnail\">";
                    $cell .= Html::tag('div', '', [
                        'style' => "background-image: url('" . Url::toImage($model->thumbnail_path, 'main') . "')",
                        'class' => "news-index__image-thumbnail"
                    ]);
                    $cell .= "</div>";
                    $cell .= "<div class=\"news-index__item-description\">";
                    $cell .= Html::a($model->title, ['/news/view', 'id' => $model->id], [
                        'class' => 'news-index__item-title'
                    ]);
                    $cell .= "<div class=\"news-index__item-publish\">";
                    $cell .= format_d($model->published_at, 'long');
                    $cell .= "</div>";
                    $cell .= "</div>";
                    $cell .= "</div>";
                    return $cell;
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
            'triggerOffset' => 0,
            'next' => '.next a',
            'enabledExtensions' => [
                ScrollPager::EXTENSION_TRIGGER,
                ScrollPager::EXTENSION_SPINNER,
                ScrollPager::EXTENSION_PAGING,
            ],
            'triggerTemplate' => '<tr class="ias-trigger"><td colspan="100%" class="text-center"><div class="simple-grid__load-more">{text}</div></td></tr>',
        ],
    ]) ?>
</div>
