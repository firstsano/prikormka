<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use frontend\models\ContactForm;
use frontend\models\Product;
use common\models\Article;

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
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'newProducts' => Product::find()->newOnes(3)->all(),
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

    public function actionAddProductToCart()
    {
        $request = Yii::$app->request;
        $product = Product::findOne($request->post('id'));
        Yii::$app->cart->put($product, $request->post('quantity', 1));
        if (!$request->isAjax) {
            return $this->goBack(['/site/index']);
        }
        return 1;
    }

    public function actionDelivery()
    {
        $model = new ContactForm();
        return $this->render('delivery', [
            'model' => $model
        ]);
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
