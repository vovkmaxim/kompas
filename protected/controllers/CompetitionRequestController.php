<?php

class CompetitionRequestController extends Controller
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

        
        public function actionAddrequest($id){
            $model=new CompetitionRequest;
            $model->user_id = Yii::app()->user->id;
            $model->competition_id = $id;
            $model->save();
            
            if(Yii::app()->request->isAjaxRequest){
//                print_r('<pre>');
//                print_r($_POST['CompetitionRequest']['group_id']);
//                print_r($_POST['CompetitionRequest']['check_data']);
//                print_r($_POST['CompetitionRequest']);
//                print_r($_POST);
//                print_r('<pre>');
//                die();
                if(isset($_POST)){  
                    $model->group_id = $_POST['CompetitionRequest']['group_id'];
                    try{
                        if(isset($_POST['CompetitionRequest']['check_data'])){
                        $check_data = $_POST['CompetitionRequest']['check_data'];
                            if(!empty($check_data)){
                                $participation_data = '';
                                $lenght = count($check_data);   
                                foreach ($check_data as $k=>$v){
                                     $participation_data .= $v . ', ';
                                }                
                                $model->participation_data = $participation_data;
                            }                        
                        }
                    } catch (\Exception $e){}
                    
                    if(isset($_POST['CompetitionRequest']['year_bird']) && !empty($_POST['CompetitionRequest']['year_bird'])){
                        $model->year = $_POST['year_bird'];
                    }
                    
//                        $model->attributes=$_POST['CompetitionRequest'];
                        $model->competition_id = $_POST['CompetitionRequest']['competition_id'];
			$model->name = $_POST['CompetitionRequest']['name'];
			$model->lastname = $_POST['CompetitionRequest']['lastname'];
			$model->year = $_POST['CompetitionRequest']['year_bird'];
			$model->chip = $_POST['CompetitionRequest']['chip'];
			$model->dyusch = $_POST['CompetitionRequest']['dyusch'];
			$model->sity = $_POST['CompetitionRequest']['sity'];
			$model->coutry = $_POST['CompetitionRequest']['coutry'];
			$model->team = $_POST['CompetitionRequest']['team'];
			$model->coach = $_POST['CompetitionRequest']['coach'];
			$model->fst = $_POST['CompetitionRequest']['fst'];
			$model->status = $_POST['CompetitionRequest']['status'];
			$model->user_id = $_POST['CompetitionRequest']['user_id'];
                        
                        if($model->save()){
                            if(!empty($_POST['CompetitionRequest']['rank'])){
                                try{
                                    $this->addRank($_POST['CompetitionRequest']['rank'], $model->id);  
                                    echo '111111111111111111111111111'; die();
                                } catch (\Exception $e){
                                    echo '\\\\\\\\\\\\\\\\\\\\\\\\\\'; die();  
                                }
                            }                                
                            echo '111111111111111111111111111'; die();
                        } else {
                            echo '/////////////////////////////////////'; die();
                        }
                }
            }
                echo '222222222222222222222222222222222222222222222222222222222222';
        }

        public function actionApplication($id)
	{            
            $model=new CompetitionRequest;
            $model->user_id = Yii::app()->user->id;
            $model->competition_id = $id;
            $model->save();
            
            if(isset($_POST['CompetitionRequest'])){  
                    $model->group_id = $_POST['group_id'];
                    try{
                        if(isset($_POST['check_data'])){
                        $check_data = $_POST['check_data'];
                            if(!empty($check_data)){
                                $participation_data = '';
                                $lenght = count($check_data);   
                                foreach ($check_data as $k=>$v){
                                     $participation_data .= $v . ', ';
                                }                
                                $model->participation_data = $participation_data;
                            }                        
                        }
                    } catch (\Exception $e){}
                    
                    if(isset($_POST['year_bird']) && !empty($_POST['year_bird'])){
                        $model->year = $_POST['year_bird'];
                    }
                    $model->attributes=$_POST['CompetitionRequest'];
                        if($model->save()){
                            if(!empty($_POST['rank'])){
                                try{
                                    $this->addRank($_POST['rank'], $model->id);  
                                    $this->redirect(array('competition/index'));
                                } catch (\Exception $e){
                                    $this->redirect(array('competition/index'));  
                                }
                            }                                
                            return $this->redirect(array('competition/index'));
                        }
            }
            $this->render('/competitionRequest/create',array(
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
//	public function actionCreate()
//	{
//		$model=new CompetitionRequest;
//
//		// Uncomment the following line if AJAX validation is needed
//		// $this->performAjaxValidation($model);
//
//		if(isset($_POST['CompetitionRequest']))
//		{
//                    
//                    print_r("<pre>");
//                    print_r($_POST);
//                    print_r("<pre>");
//                    die();
//			$model->attributes=$_POST['CompetitionRequest'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->id));
//		}
//
//		$this->render('create',array(
//			'model'=>$model,
//		));
//	}

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
//		if(isset($_POST['CompetitionRequest']))
//		{
//                    
//                    print_r("<pre>");
//                    print_r($_POST);
//                    print_r("<pre>");
//                    die();
//                    
//			$model->attributes=$_POST['CompetitionRequest'];
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

//	/**
//	 * Lists all models.
//	 */
//	public function actionIndex()
//	{
//		$dataProvider=new CActiveDataProvider('CompetitionRequest');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
//	}
//
//	/**
//	 * Manages all models.
//	 */
//	public function actionAdmin()
//	{
//		$model=new CompetitionRequest('search');
//		$model->unsetAttributes();  // clear any default values
//		if(isset($_GET['CompetitionRequest']))
//			$model->attributes=$_GET['CompetitionRequest'];
//
//		$this->render('admin',array(
//			'model'=>$model,
//		));
//	}
//
//	/**
//	 * Returns the data model based on the primary key given in the GET variable.
//	 * If the data model is not found, an HTTP exception will be raised.
//	 * @param integer $id the ID of the model to be loaded
//	 * @return CompetitionRequest the loaded model
//	 * @throws CHttpException
//	 */
//	public function loadModel($id)
//	{
//		$model=CompetitionRequest::model()->findByPk($id);
//		if($model===null)
//			throw new CHttpException(404,'The requested page does not exist.');
//		return $model;
//	}
//
//	/**
//	 * Performs the AJAX validation.
//	 * @param CompetitionRequest $model the model to be validated
//	 */
//	protected function performAjaxValidation($model)
//	{
//		if(isset($_POST['ajax']) && $_POST['ajax']==='competition-request-form')
//		{
//			echo CActiveForm::validate($model);
//			Yii::app()->end();
//		}
//	}
}
