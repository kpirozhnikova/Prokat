<?php
namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use app\models\Client;

/**
 * Site controller
 */
class ClientController extends Controller
{ 

	public function behaviors()
	    {
	        return [
	            'access' => [
	                'class' => AccessControl::className(),
	                'rules' => [
	                    [
	                        'allow' => true,
	                        'roles' => ['@'],
	                    ],
	                ],
	            ]
	        ];
	    }


	public function actionIndex ()
	{
		$clients=Client::find()
		->orderBy(['last_name' => SORT_ASC, 'first_name'=> 
		SORT_ASC])
		->all ();
		return $this->render('index', ['clients' => $clients]);
	}

	public function actionEdit($id) {
		$client=Client::findOne($id);
		if (!$client) {
			throw new \yii\web\NotFoundHttpException('Запись не найдена');
		}
		
		if (isset($_POST['Client'])) {
			$client->attributes=$_POST['Client'];
			if ($client->save()) {
				return $this->redirect(['client/index']);
			}
		}
		return $this->render('add', ['client'=>$client]);
	}
	
	public function actionDelete($id){
		$client=Client::findOne($id);
		if (!$client) {
			throw new \yii\web\NotFoundHttpException('Запись не найдена');
		}
		$client->delete();
		return $this->redirect(['client/index']);
	}
	
	public function actionAdd() {
		$client=new Client;
		if (isset($_POST['Client'])){
			$client->attributes=$_POST['Client'];
			if ($client->save()) {
				return $this->redirect(['client/index']);
			}
			
		}
		return $this->render('add', ['client'=>$client]);
		
	}
}
