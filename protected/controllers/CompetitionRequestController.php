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
       
        
}
