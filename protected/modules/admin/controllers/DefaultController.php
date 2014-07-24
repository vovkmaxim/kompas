<?php

class DefaultController extends AdminController
{
	public function actionIndex()
	{
            if(Yii::app()->user->getRole() !== "administrator"){
                $this->actionLogin();
            }else{
//                $this->layout='application.modules.admin.views.layouts.main';
                $this->render('index');
            }    
//            $this->render('index');
	}
        /**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
                
//                print_r("<pre>");
//                print_r($this);
//                print_r("<pre>");
//                die();
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
//				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
}