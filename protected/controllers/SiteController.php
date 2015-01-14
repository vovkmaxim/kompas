<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
            $criteria = new CDbCriteria;
            $criteria->condition = 't.status =1';
            $criteria->order = 't.position DESC';
            $dataProvider=new CActiveDataProvider('Events', array('criteria' => $criteria));
         
            $competition = Competition::model()->findAll('archive=2 ORDER BY position DESC');
            $this->render('index',array(
			'dataProvider'=>$dataProvider,
			'competition'=>$competition,
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
        
        /**
	 * Displays the login page
	 */
	public function actionRemember()
	{
		$model=new RememberForm;
		if(isset($_POST['ajax']) && $_POST['ajax']==='remember-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['RememberForm']))
		{
                    
			$model->attributes=$_POST['RememberForm'];
                        
                        $mail=Yii::app()->Smtpmail;
                        $mail->IsSMTP();
                        $mail->SetFrom('mvovk90@gmail.com', 'ТЕСТ');
                        $mail->Subject = 'TEST';
                        $mail->MsgHTML('<h1>TEST MESSAGE!!!</h1>');
                        $mail->AddAddress('mvovk90@mail.ru', "");
                        if(!$mail->Send()) {
                            echo "Mailer Error: " . $mail->ErrorInfo;
                        }else {
                            echo "Message sent!";
                        }
                        
                        $email = Yii::app()->email;
                        $email->to = 'mvovk90@mail.ru';
                        $email->subject = 'Hello';
                        $email->message = 'Hello bro';
                        $email->send();
                        

                        
//			if($model->validate() && $model->login())
//				$this->redirect(Yii::app()->user->returnUrl);
		}
		$this->render('remember',array('model'=>$model));
	}
}