<?php
namespace frontend\controllers;

use Yii;
use yii\web\Response;
use yii\filters\VerbFilter;
use frontend\models\ContactForm;
use frontend\models\Product;
use frontend\extensions\Controller;
use common\models\Feedback;
use common\models\Article;
use common\models\WidgetCarousel;
use yii\base\DynamicModel;
use frontend\models\SubscribeForm;
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
            ]
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
                    'set-data-display' => ['put']
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'carouselItems' => @WidgetCarousel::find()->where(['key' => 'index'])->one()->activeItems,
            'newProducts' => Product::find()->newOnes()->all(),
            'bestOffers' => Product::find()->bestOffers()->all(),
            'feedbacks' => Feedback::find()->newOnes(2)->all(),
            'latestNews' => Article::find()->published()->newOnes(4)->all()
        ]);
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

    public function actionPayment()
    {
        return $this->render('payment');
    }

    public function actionDelivery()
    {
        return $this->render('delivery');
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
            if ($model->contact(Yii::$app->params['adminEmail'])) {
                Yii::$app->getSession()->setFlash('alert', [
                    'body'=>Yii::t('frontend', 'Thank you for contacting us. We will respond to you as soon as possible.'),
                    'options'=>['class'=>'alert-success']
                ]);
                return $this->refresh();
            } else {
                Yii::$app->getSession()->setFlash('alert', [
                    'body'=>\Yii::t('frontend', 'There was an error sending email.'),
                    'options'=>['class'=>'alert-danger']
                ]);
            }
        }

        return $this->render('contact', [
            'model' => $model
        ]);
    }
}
