<?php
namespace frontend\controllers;

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
use app\models\Hire;
use app\models\Client;
use app\models\Videocassette;

/**
 * Site controller
 */
class HireController extends Controller
{ 
	public function actionIndex ()
	{

		$hires=Hire::find()
		->having('return_date > NOW()')
		->all ();
	
		return $this->render('index', ['hires' => $hires]);
	}
	

	public function actionEdit($id) {
		$hire=Hire::findOne($id);
		if (!$hire) {
			return 'Запись не найдена';
		}
		$videocassettes=Videocassette::find()->having('status=1') ->all();
		$clients=Client::find()->all();
		if (isset($_POST['Hire'])) {
			$hire->attributes=$_POST['Hire'];
			if ($hire->save()) {
				return $this->redirect(['hire/index']);
			}
		}
		$videocassettes=Videocassette::find()->all();
		if (isset($_POST['Hire'])) {
			$hire->attributes=$_POST['Hire'];
			if ($hire->save()) {
				return $this->redirect(['hire/index']);
			}
		}
		return $this->render('edit', ['hire'=>$hire,'clients'=>$clients, 'videocassettes'=>$videocassettes]);
	}
	
	public function actionDelete($id){
		$hire=Hire::findOne($id);
		if (!$hire) {
			return 'Запись не найдена';
		}
		$hire->delete();
		return $this->redirect(['hire/index']);
	}
	
	public function actionAdd($client=null, $videocassette=null) {
		$hire=new Hire;
		$hire->client_id=$client;
		$clients=Client::find()->all();
		if (isset($_POST['Hire'])){
			$hire->attributes=$_POST['Hire'];
			if ($hire->save()) {
				return $this->redirect(['hire/index']);
			}
			
		}
		$videocassettes=Videocassette::find()->having('status=1')->all();
		if (isset($_POST['Hire'])){
			$hire->attributes=$_POST['Hire'];
			if ($hire->save()) {
				return $this->redirect(['hire/index']);
			}
			
		}
		return $this->render('add', ['hire'=>$hire,'clients'=>$clients, 'videocassettes'=>$videocassettes]);
		
	}

		public function actionArchive(){
		$hires=Hire::find()
		->having('return_date < NOW()')
		->all ();
		return $this->render('archive', ['hires' => $hires]);
	}

	public function actionEditarchive($id) {
		$hire=Hire::findOne($id);
		if (!$hire) {
			return 'Запись не найдена';
		}
		$videocassettes=Videocassette::find()->having('status=1') ->all();
		$clients=Client::find()->all();
		if (isset($_POST['Hire'])) {
			$hire->attributes=$_POST['Hire'];
			if ($hire->save()) {
				return $this->redirect(['hire/archive']);
			}
		}
		$videocassettes=Videocassette::find()->all();
		if (isset($_POST['Hire'])) {
			$hire->attributes=$_POST['Hire'];
			if ($hire->save()) {
				return $this->redirect(['hire/archive']);
			}
		}
		return $this->render('editarchive', ['hire'=>$hire,'clients'=>$clients, 'videocassettes'=>$videocassettes]);
	}
}