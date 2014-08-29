<?php

class CompetitionRequestController extends AdminController
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
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['CompetitionRequest']))
		{
			$model->attributes=$_POST['CompetitionRequest'];
                        if($model->save()){
                            if(!empty($_POST['rank'])){
                                try{
                                    $this->addRank($_POST['rank'], $model->id);   
                                } catch (\Exception $e){
                                    return $this->actionAdmin();  
                                }
                            }                                
				return $this->actionAdmin();
                        }
                }

		$this->render('update',array(
			'model'=>$model,
		));
	}
        
        public function addRank($rank_id, $request_id){
            $prom_rank = RankHasCompetitionRequest::model()->find('competition_request_id=:competition_request_id', array(':competition_request_id' => $request_id));
            if($prom_rank != NULL){
                $prom_rank->rank_id = $rank_id;
                $prom_rank->competition_request_id = $request_id;
                $prom_rank->save();
            } else {
                $prom_rank = new RankHasCompetitionRequest();
                $prom_rank->rank_id = $rank_id;
                $prom_rank->competition_request_id = $request_id;
                $prom_rank->save();
            }
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
		$model=new CompetitionRequest('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CompetitionRequest']))
			$model->attributes=$_GET['CompetitionRequest'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CompetitionRequest the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CompetitionRequest::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CompetitionRequest $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='competition-request-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
