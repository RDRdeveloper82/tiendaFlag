<?php
namespace frontend\controllers;

use common\models\Product;
use common\models\Subscriber;
use common\models\User;
use common\models\States;
use Yii;
use yii\bootstrap\Alert;
use yii\data\ArrayDataProvider;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use frontend\models\LoginFormFrontend;
use yii\helpers\Json;
use yii\captcha\CaptchaAction;



/**
 * Site controller
 */
class SiteController extends Controller {
	
	//Access control for registered users @ and non registered users ?
	public function behaviors() {
		return [
				'access' => [
						'class' => AccessControl::className(),
						'rules' => [
								[
										'actions' => ['login', 'error', 'index', 'register', 'states', 'captcha'],
										'allow' => true,
										
										
								],
								[
										'actions' => ['logout', 'index', 'subscribe'],
										'allow' => true,
										'roles' => ['@'],
								],
						],
				],
				'verbs' => [
						'class' => VerbFilter::className(),
						'actions' => [
								'logout' => ['post'],
						],
				],
		];
		
	}
	
    /**
     * @inheritdoc
     */
    public function actions() {
    	
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        	'captcha' => [
        		'class' => 'yii\captcha\CaptchaAction',
        		'fixedVerifyCode' => null,
        		],
        ];
        
    }

    public function actionIndex() {
    	
        $this->layout = 'fullwide';
        
        $dataProvider = new ArrayDataProvider([
            'allModels' => Product::find()->limit(8)->orderBy('date DESC')->all()
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
        
    }

   
    public function actionSubscribe() {
    	
        $model = new Subscriber();
        $model->date = date('Y-m-d H:i');

        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax) {
            if ($model->validate() && $model->save()) {
                $msg =
                    Yii::t('frontend', 'You have successfully subscribed to our updates and news!');

                $type = 'success';

                Yii::$app->session->set('subscribed', $msg);
            } else {
                $msg =
                    Yii::t('frontend', 'This email is already subscribed');

                $type = 'danger';
            }

            Yii::$app->response->format = Response::FORMAT_JSON;

            $body = Alert::widget([
                'body' => $msg,
                'options' => ['class' => 'alert-' . $type]
            ]);

            return [
                'body' => $body,
                'type' => $type,
            ];
        }

        return $this->redirect(['site/index']);
        
    }
    
    //If the login data is ok goes to index else comes back to login form.
    public function actionLogin() {
    	
    	if (!\Yii::$app->user->isGuest) {
    		return $this->goHome();
    	}
    	
    	$model = new LoginFormFrontend();
    	
    	if ($model->load(Yii::$app->request->post()) && $model->login()) {
    		$dataProvider = new ArrayDataProvider([
    				'allModels' => Product::find()->limit(8)->orderBy('date DESC')->all()
    		]);
    		return $this->render('index', [
    				'dataProvider' => $dataProvider,
    				]);
    	} else {
    		return $this->render('login', [
    				'model' => $model,
    		]);
    	}
    	
    }
    
    //If the data is ok, makes a redirect to login else goes back to register form
    public function actionRegister() { 	
    	
    	$model = new User();
    	$modelLog = new LoginFormFrontend();
    	
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		return $this->render('login', [
    				'model' => $modelLog,
    				]);
    	} else {
    		return $this->render('_form', [
    				'model' => $model,		
    		]);
    	}
    	
    }
    
    //This does the depdrop magic. It´s  a call to a function which returns a the list of subcat based in the cat_id
    public function actionStates() {
    	
    	$out = [];
    	if (isset($_POST['depdrop_parents'])) {
    		$parents = $_POST['depdrop_parents'];
    		if ($parents != null) {
    			$country_id = $parents[0];
    			$out = States::getSubCatList($country_id);
    			echo Json::encode(['output'=>$out, 'selected'=>'']);
    			return;
    		}
    	}
    	echo Json::encode(['output'=>'', 'selected'=>'']);
    	
    }
    
    
	//Logout the @ user without a view
    public function actionLogout() {
    	
    	Yii::$app->user->logout();   
    	return $this->goHome();
    	
    }
    
}
