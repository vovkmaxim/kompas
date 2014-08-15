<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
//	public function actionUpdate($id)
//	{
//		$model=$this->loadModel($id);
//
//		// Uncomment the following line if AJAX validation is needed
//		// $this->performAjaxValidation($model);
//
//		if(isset($_POST['User']))
//		{
//			$model->attributes=$_POST['User'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->id));
//		}
//
//		$this->render('update',array(
//			'model'=>$model,
//		));
//	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
//	public function actionDelete($id)
//	{
//		$this->loadModel($id)->delete();
//
//		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//		if(!isset($_GET['ajax']))
//			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
//	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            $criteria = new CDbCriteria;
            $criteria->condition = 't.status = 1 AND t.member =1';
            $dataProvider=new CActiveDataProvider('User', array('criteria' => $criteria));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
//	public function actionAdmin()
//	{
//		$model=new User('search');
//		$model->unsetAttributes();  // clear any default values
//		if(isset($_GET['User']))
//			$model->attributes=$_GET['User'];
//
//		$this->render('admin',array(
//			'model'=>$model,
//		));
//	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionRegistration()
        {
            $model=new User('register');

            // uncomment the following code to enable ajax-based validation
            
            if(isset($_POST['ajax']) && $_POST['ajax']==='user-registration-form')
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
            

            if(isset($_POST['User']))
            {
                $user = new User();
                $model->attributes=$_POST['User'];
                
                
                if($model->validate())
                {
                    if(User::model()->count("username = :login",array(':login' => $model->username))){
                        $model->addError('username','Это имя уже используется!');
                        $this->render('registration',array('model'=>$model));
                        
                    }else{
                        $user->status = 0;
                        $user->member = 0;
                        $user->email  = $model->email;
                        $user->username = $model->username;
                        $user->password = md5($model->password);
                        $user->name   = $model->name;
                        $user->lastname = $model->lastname;
                        $user->phone  = $model->phone;
                        $user->sity   = $model->sity;
                        $user->coutry = $model->coutry;
                        $user->club   = $model->club;
                        $user->data_birth = $model->data_birth;
                        $user->save(false);
                        $this->render('registration',array('model'=>$model));
                    }
                    
                    
                    // form inputs are valid, do something here
//                    return;
                }
            }
            $this->render('registration',array('model'=>$model));
        }
}
