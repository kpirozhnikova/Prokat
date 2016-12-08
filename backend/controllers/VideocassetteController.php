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
use app\models\Videocassette;

/**
 * Site controller
 */
class VideocassetteController extends Controller
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
		$videocassettes=Videocassette::find()
		->orderBy(['name_videocassette' => SORT_ASC])
		->all ();
		return $this->render('index', ['videocassettes' => $videocassettes]);
	}

	public function actionEdit($id) {
		$videocassette=Videocassette::findOne($id);
		if (!$videocassette) {
			return 'Видеокассета не найдена';
		}
	
		if (isset($_POST['Videocassette'])) {
			$videocassette->attributes=$_POST['Videocassette'];
			if ($videocassette->save()) {
				return $this->redirect(['videocassette/index']);
			}
		}
		return $this->render('add', ['videocassette'=>$videocassette]);
	}
	
	public function actionDelete($id){
		$videocassette=Videocassette::findOne($id);
		if (!$videocassette) {
			return 'Видеокассета не найдена';
		}
		$videocassette->delete();
		return $this->redirect(['videocassette/index']);
	}
	
	public function actionAdd() {
		$videocassette=new Videocassette;
		$videocassette->status=1;
		if (isset($_POST['Videocassette'])){
			$videocassette->attributes=$_POST['Videocassette'];
			if ($videocassette->save()) {
				return $this->redirect(['videocassette/index']);
			}
			
		}
		return $this->render('add', ['videocassette'=>$videocassette]);
		
	}
}