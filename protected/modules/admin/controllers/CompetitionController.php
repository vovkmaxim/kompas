<?php

class CompetitionController extends AdminController
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
		$model=new Competition;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Competition']))
		{
			$model->type = $_POST['type'];
			$model->start_data = $_POST['year_start_data'] . '-' . $_POST['monts_start_data'] . '-' . $_POST['day_start_data'];
			$model->start_time = $_POST['hour_start_time'] . ':00:00';
			$model->end_data = $_POST['year_end_data'] . '-' . $_POST['monts_end_data'] . '-' . $_POST['day_end_data'];
			$model->end_time = $_POST['hour_end_time'] . ':00:00';
			$model->close_registration_data = $_POST['year_close_registration_data'] . '-' . $_POST['monts_close_registration_data'] . '-' . $_POST['day_close_registration_data'];
			$model->close_registration_time = $_POST['hour_close_registration_time'] . ':00:00';
                        $model->enable_registration_flag = $_POST['enable_registration_flag'];
			$model->archive = $_POST['archive'];
			$model->position = 0;
			$model->attributes = $_POST['Competition'];
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Competition']))
		{
                        $model->type = $_POST['type'];
			$model->start_data = $_POST['year_start_data'] . '-' . $_POST['monts_start_data'] . '-' . $_POST['day_start_data'];
			$model->start_time = $_POST['hour_start_time'] . ':00:00';
			$model->end_data = $_POST['year_end_data'] . '-' . $_POST['monts_end_data'] . '-' . $_POST['day_end_data'];
			$model->end_time = $_POST['hour_end_time'] . ':00:00';
			$model->close_registration_data = $_POST['year_close_registration_data'] . '-' . $_POST['monts_close_registration_data'] . '-' . $_POST['day_close_registration_data'];
			$model->close_registration_time = $_POST['hour_close_registration_time'] . ':00:00';
                        $model->enable_registration_flag = $_POST['enable_registration_flag'];
			$model->archive = $_POST['archive'];
			$model->position = 0;
			$model->attributes=$_POST['Competition'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Competition('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Competition']))
			$model->attributes=$_GET['Competition'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Competition the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Competition::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Competition $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='competition-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
