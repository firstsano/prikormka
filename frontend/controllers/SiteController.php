<?php
namespace frontend\controllers;

use Yii;
use yii\web\Response;
use yii\filters\VerbFilter;
use frontend\models\ContactForm;
use frontend\models\Product;
use frontend\extensions\Controller;
use frontend\components\extensions\Url;
use yii\helpers\StringHelper;
use common\models\Article;
use common\models\WidgetCarousel;
use frontend\models\SubscribeForm;
use frontend\components\extensions\ArrayHelper;
use Exception;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
            'download'=>[
                'class'=>'trntv\filekit\actions\ViewAction',
            ],
            'page' => [
                'class' => 'yii\web\ViewAction',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'add-product-to-cart' => ['post'],
                    'remove-all-from-cart' => ['post'],
                    'subscribe' => ['post'],
                    'set-data-display' => ['put'],
                    'get-image' => ['get']
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'carouselItems' => @WidgetCarousel::find()->where(['key' => 'index'])->one()->activeItems,
            'newProducts' => Product::find()->newOnes()->all(),
            'latestNews' => Article::find()->published()->newOnes(4)->all()
        ]);
    }

    public function actionGetImage($path, $type = 'default')
    {
        $typeWidth = 150;
        switch ($type) {
            case 'main':
                $typeWidth = 800;
                break;
            case 'thumb':
                $typeWidth = 80;
                break;
        }
        $imagePath = Yii::getAlias(Yii::$app->glide->sourcePath) . DIRECTORY_SEPARATOR . $path;
        if (!file_exists($imagePath)) {
            return false;
        }
        $image = Yii::$app->image->load($imagePath);
        $glideConfig = [];
        if ($image->width > $typeWidth) {
            $glideConfig = ['w' => $typeWidth];
        }
        return Yii::$app->glide->outputImage($path, $glideConfig);
    }

    public function actionSubscribe()
    {
        $model = new SubscribeForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', [
                'type' => 'notice',
                'title' => Yii::t('frontend/site', 'subscribe.title'),
                'message' => Yii::t('frontend/site', 'subscribe-success.message'),
            ]);
            return $this->goHome();
        }
        return $this->render('/site/subscribe', [
            'model' => $model
        ]);
    }

    public function actionWholesale()
    {
        return $this->render('wholesale', [
            'products' => Product::find()->all(),
        ]);
    }

    public function actionProductList($query) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $productsList = Product::previewList([
            'query' => $query,
            'limit' => 10,
            'offset' => 0
        ]);
        $output = [
            'items' => [],
            'total_count' => $productsList['total_count'],
            'more_link' => Url::to(['/wholesale-catalog/index', 'filter' => $query])
        ];
        foreach ($productsList['items'] as $product) {
            $output['items'][] = ArrayHelper::toArray($product, [
                Product::className() => [
                    'name' => function($product) {
                        return StringHelper::truncate($product->name, 50);
                    },
                    'url' => function($product) {
                        return Url::toProduct($product);
                    }
                ]
            ]);
        }
        return $output;
    }

    public function actionAddProductToCart()
    {
        $request = Yii::$app->request;
        $cart = Yii::$app->cart;
        $product = Product::findOne($request->post('id'));
        $cart->put($product, $request->post('quantity', 1));
        if (!$request->isAjax) {
            return $this->goBack(['/site/index']);
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'cart' => [
                'count' => $cart->count,
                'cost' => $cart->cost
            ]
        ];
    }

    public function actionSetDataDisplay()
    {
        $request = Yii::$app->request;
        $loaded = Yii::$app->dataDisplay->loadData($request->post());
        if (!$request->isAjax) {
            return $this->goHome();
        }
        if ($loaded) {
            return true;
        }
        return false;
    }

    public function actionRemoveAllFromCart()
    {
        Yii::$app->cart->removeAll();
        return $this->redirect(['/cart/view']);
    }

    public function actionRemoveProductFromCart()
    {
        $request = Yii::$app->request;
        $cart = Yii::$app->cart;
        try {
            $cart->removeById($request->post('id'));
        } catch (Exception $e) {
            // ignore
        }
        if (!$request->isAjax) {
            return $this->goBack(['/site/index']);
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'cart' => [
                'count' => $cart->count,
                'cost' => $cart->cost
            ]
        ];
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->contact()) {
                Yii::$app->session->setFlash('success', [
                    'type' => 'notice',
                    'title' => Yii::t('frontend/site', 'mail-contact.title'),
                    'message' => Yii::t('frontend/site', 'mail-contact-success.message'),
                ]);
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('success', [
                    'type' => 'warning',
                    'title' => Yii::t('frontend/site', 'mail-contact.title'),
                    'message' => Yii::t('frontend/site', 'mail-contact-error.message'),
                ]);
            }
        }

        return $this->render('contact', [
            'model' => $model
        ]);
    }
}
