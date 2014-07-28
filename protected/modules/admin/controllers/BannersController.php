<?php

class BannersController extends AdminController
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
		$model=new Banners;
                $model->setScenario("insert");
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

                $basePath = Yii::app()->basePath. '/banners/';
                            
                            
		if(isset($_POST['Banners']))
		{
                        $model->attributes=$_POST['Banners'];
//                        $model->path=CUploadedFile::getInstance($model,'path');
                        if($model->save()){            
//                                $file = Yii::app()->params['addBaners'] . $model->id.'_assortiment.jpg';
//                                @mkdir(Yii::app()->params['addBaners'],0777,TRUE);
//                                @chmod(Yii::app()->params['addBaners'], 0777);
//
//                                $model->path->saveAs($file);
//                                $model->path = Yii::app()->params['bannersPath'] . $model->id.'_assortiment.jpg';;
//                                $model->save();
                            $this->redirect(array('view','id'=>$model->id));
                        }
//			if($model->save())				
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
                $model->setScenario("update");  
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Banners']))
		{
			$model->attributes=$_POST['Banners'];
//                        if($model->path){
                            //@unlink('../o-kompas/themes/banners/' . $model->id . '_assortiment.jpg');
//                            $model->path=CUploadedFile::getInstance($model,'path');
//                        }                        
			if($model->save()){
//                             $file = Yii::app()->params['addBaners'] . $model->id.'_assortiment.jpg';
//                             @mkdir(Yii::app()->params['addBaners'],0777,TRUE);
//                             @chmod(Yii::app()->params['addBaners'], 0777);
//                             $model->path->saveAs($file);
//                             $model->path = Yii::app()->params['bannersPath'] . $model->id.'_assortiment.jpg';;
//                             $model->save();
                             $this->redirect(array('view','id'=>$model->id));
                        }
				
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
//                @unlink(Yii::app()->params['addBaners'] . $id . '_assortiment.jpg');
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
		$model=new Banners('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Banners']))
			$model->attributes=$_GET['Banners'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Banners the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Banners::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Banners $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='banners-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}       

}
