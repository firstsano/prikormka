<?php
namespace frontend\controllers;

use Yii;
use yii\web\Response;
use yii\filters\VerbFilter;
use frontend\models\ContactForm;
use frontend\models\Product;
use frontend\extensions\Controller;
use common\models\Article;
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
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'newProducts' => Product::find()->newOnes()->all(),
            'bestOffers' => Product::find()->bestOffers()->all(),
            'latestNews' => Article::find()->published()->news()->newOnes(4)->all()
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

    public function actionAbout()
    {
        return $this->render('about');
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
