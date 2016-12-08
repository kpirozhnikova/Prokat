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
use app\models\Videocassette;

/**
 * Site controller
 */
class VideocassetteController extends Controller
{ 
	public function actionIndex (){
		$videocassettes=Videocassette::find()
		->orderBy(['name_videocassette' => SORT_ASC])
		->all ();
		return $this->render('index', ['videocassettes' => $videocassettes]);
	}
	
	public function actionView($id){
		$videocassette = Videocassette::findOne($id);
		if ($videocassette) {
			return $this->render('view', ['videocassette' => $videocassette]);
		} else {
			return 'Фильм не найден';
		}
	} 
}