<?php
class CompetitionController extends Controller
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
            
            $criteria = new CDbCriteria;
            $criteria->condition = 't.competition_id =' . $id;
            $criteria->order = 't.group_id';
            $request=new CActiveDataProvider('CompetitionRequest', array('criteria' => $criteria));
            $request->pagination->pageSize = count(CompetitionRequest::model()->findAll());
            
            $criteria = new CDbCriteria;
            $criteria->condition = 't.competition_id =' . $id;
            $file=new CActiveDataProvider('File', array('criteria' => $criteria));
            
            $criteria = new CDbCriteria;
            $criteria->condition = 't.competition_id =' . $id;
            $comments = new CActiveDataProvider('Comments', array('criteria' => $criteria));
            $comments->pagination->pageSize = count(Comments::model()->findAll());
//            $request = CompetitionRequest::model()->findAll('competition_id=:competition_id',array(':competition_id' => $id));
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'request'=> $request,
			'file'=> $file,
			'comments'=> $comments,
		));
	}
        
        /**
         * 
         * @param type $id
         */        
        public function actionaddrequest($id){
            if(Yii::app()->request->isAjaxRequest){                
                if(isset($_POST)){  
                        $return_mass = array();
                        $model = new CompetitionRequest();  
                        $model->competition_id = $_POST['CompetitionRequest']['competition_id'];
                        $model->group_id = $_POST['group_id'];                        
			$model->name = $_POST['CompetitionRequest']['name'];;
			$model->lastname =  $_POST['CompetitionRequest']['lastname'];
			$model->year = $_POST['CompetitionRequest']['year_bird'];
			$model->chip = $_POST['CompetitionRequest']['chip'];
			$model->dyusch = $_POST['CompetitionRequest']['dyusch'];
			$model->sity = $_POST['CompetitionRequest']['sity'];
			$model->coutry = $_POST['CompetitionRequest']['coutry'];
			$model->team = $_POST['CompetitionRequest']['team'];
			$model->coach = $_POST['CompetitionRequest']['coach'];
			$model->fst = $_POST['CompetitionRequest']['fst'];
                        $model->participation_data = $_POST['check_data'];
                        $model->status = 0;
                        $model->user_id = Yii::app()->user->id;
                        
                        if($model->save()){
                            $rank = new RankHasCompetitionRequest();
                            $rank->competition_request_id = $model->id;
                            $rank->rank_id = $_POST['CompetitionRequest']['rank'];
                            $rank->save();                            
                            $return_mass['success'] = true;
                            $return_mass['message'] = 'Ваша заявка принята на рассмотрение.';
                            echo json_encode($return_mass);
                            exit();
                        } else {
                            $return_mass['success'] = FALSE;
                            $return_mass['message'] = 'Ваша заявка не принята, произошла неизвестная ошибка.';
                            echo json_encode($return_mass);
                            exit();
                        }
                }
            }
        }
        
        
        public function actionUpdatevievs($id){
            if(Yii::app()->request->isAjaxRequest){ 
                
                $criteria = new CDbCriteria;
                $criteria->condition = 't.competition_id =' . $id;
                $criteria->order = 't.group_id';
                $request=new CActiveDataProvider('CompetitionRequest', array('criteria' => $criteria));
                $request->pagination->pageSize = count(CompetitionRequest::model()->findAll());
                return $this->widget('zii.widgets.grid.CGridView', array(
                                    'id' => 'competition-request-grid',
                                    'dataProvider' => $request,
                                    'template' => '{pager}{items}{pager}',
                                    'columns' => array(
                                        array('name' => 'group_id','type' => 'raw','value' => '$data->getGroupName()','filter' => false,),
                                        'lastname',
                                        'name',
                                        'year',
                                        'sity',
                                        'team',
                                        'participation_data',
                                        array(
                                            'name' => 'Разряд',
                                            'type' => 'raw',
                                            'value' => '$data->getRankName()',
                                            'filter' => false,
                                        ),
                                        array(
                                            'name' => 'Статус',
                                            'type' => 'raw',
                                            'value' => '$data->getNameStatus()',
                                            'filter' => false,                                            
                                            ),
                                        array(
                                            'name' => 'Представитель',
                                            'type' => 'raw',
                                            'value' => '$data->getNameUser()',
                                            'filter' => false,
                                            ),
                                    ),
                ));
                exit();
            }
        }
        
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            $criteria = new CDbCriteria;
            $criteria->condition = 't.type = 2 AND t.archive = 2';
            $criteria->order = 't.position DESC';
            $dataProvider=new CActiveDataProvider('Competition', array('criteria' => $criteria));
            $dataProvider->pagination->pageSize = count(Competition::model()->findAll());
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionTraining()
	{
            $criteria = new CDbCriteria;
            $criteria->condition = 't.type = 1 AND t.archive = 2';
            $criteria->order = 't.position DESC';
            $dataProvider=new CActiveDataProvider('Competition', array('criteria' => $criteria));
		$this->render('training',array(
			'dataProvider'=>$dataProvider,
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
		$model->views = $model->views + 1 ;
                $model->save();
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
        
        
        public function actionExcel($id){
            
            
            $CompetitionRequest = CompetitionRequest::model()->findAll('competition_id=:id ORDER BY t.group_id',array(':id'=>$id));
            $len  = count($CompetitionRequest);
            
            spl_autoload_unregister(array('YiiBase','autoload'));
            Yii::import('ext.PHPExcel.Classes.PHPExcel', true);
            spl_autoload_register(array('YiiBase','autoload')); 
            
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("PHP")
                ->setLastModifiedBy("o-kompas")
                ->setTitle("Office 2007 XLSX reports-competition")
                ->setSubject("Office 2007 XLSX reports-competition")
                ->setDescription("Тестовый файл Office 2007 XLSX, reports-competition PHPExcel.")
                ->setKeywords("office 2007 openxml php")
                ->setCategory("reports-competition");
            $objPHPExcel->getActiveSheet()->setTitle('Демо');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Номер');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Группа');    
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'Имя');    
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'Фамилия');    
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'Год');    
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'Город');    
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'Страна');    
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'Старты');    
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'Разряд');    
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1', 'Представитель');    
 
            for($i=0;$i<$len;$i++){
                $j=$i;
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($i+2), $i+1);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.($i+2), $this->getGroupName($CompetitionRequest[$i]->group_id));
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.($i+2), $CompetitionRequest[$i]->lastname); 
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.($i+2), $CompetitionRequest[$i]->name);       
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.($i+2), $CompetitionRequest[$i]->year);    
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.($i+2), $CompetitionRequest[$i]->sity);    
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.($i+2), $CompetitionRequest[$i]->coutry);    
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.($i+2), $CompetitionRequest[$i]->participation_data);    
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.($i+2), $CompetitionRequest[$i]->getRankName());    
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.($i+2), $this->getUserName($CompetitionRequest[$i]->user_id));
//                print_r('<pre>');
//                print_r($CompetitionRequest[$i]->id);
//                print_r($CompetitionRequest[$i]->group_id);
//                print_r($CompetitionRequest[$i]->name);
//                print_r($CompetitionRequest[$i]->lastname);
//                print_r($CompetitionRequest[$i]->year);
//                print_r($CompetitionRequest[$i]->chip);
//                print_r($CompetitionRequest[$i]->dyusch);
//                print_r($CompetitionRequest[$i]->sity);
//                print_r($CompetitionRequest[$i]->coutry);
//                print_r($CompetitionRequest[$i]->team);
//                print_r($CompetitionRequest[$i]->coach);
//                print_r($CompetitionRequest[$i]->fst);
//                print_r($CompetitionRequest[$i]->participation_data);
//                print_r($CompetitionRequest[$i]->status);
//                print_r($CompetitionRequest[$i]->user_id);
//                print_r('<pre>');
            }
            
            
//            header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
//            header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
//            header ( "Cache-Control: no-cache, must-revalidate" );
//            header ( "Pragma: no-cache" );
//            header ( "Content-type: application/excel" );
//            header ( "Content-Disposition: attachment; filename=report.xlsx" );

            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
//            $objWriter->save('php://output');
            $objWriter->save('xls/report.xlsx');
            $this->redirect(Yii::app()->request->baseUrl.'/xls/report.xlsx' );

        }
        
        private function getGroupName($group_id){
            $group = Group::model()->find('id=:id',array(':id'=>$group_id));
            return $group->name;
        }
        
        private function getUserName($user_id){
            $user = User::model()->find('id=:id',array(':id'=>$user_id));
            return $user->username;
        }
        
}
