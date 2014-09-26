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
        
//	public function accessRules()
//	{
//		return array(
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
//			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
//		);
//	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
            
            $criteria = new CDbCriteria;
            $criteria->condition = 't.competition_id =' . $id;
            $request=new CActiveDataProvider('CompetitionRequest', array('criteria' => $criteria));
            
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
                $request = new CActiveDataProvider('CompetitionRequest', array('criteria' => $criteria));
                
                return $this->widget('zii.widgets.grid.CGridView', array(
                                    'id' => 'competition-request-grid',
                                    'dataProvider' => $request,
                                    'template' => '{pager}{items}{pager}',
                                    'columns' => array(
                                        'id', 
                                        array('name' => 'group_id','type' => 'raw','value' => '$data->getGroupName()','filter' => false,),
                                        'name',
                                        'lastname',
                                        'year',
                                        'sity',
                                        'coutry',
                                        'participation_data',
                                        array('name' => 'Состояние','type' => 'raw','value' => '$data->getNameStatus()','filter' => false,),
                                        array('name' => 'Представитель','type' => 'raw','value' => '$data->getNameUser()','filter' => false,),
                                    ),
                ));
                exit();
            }
        }
        
        
//
//	/**
//	 * Creates a new model.
//	 * If creation is successful, the browser will be redirected to the 'view' page.
//	 */
//	public function actionCreate()
//	{
//		$model=new Competition;
//
//		// Uncomment the following line if AJAX validation is needed
//		// $this->performAjaxValidation($model);
//
//		if(isset($_POST['Competition']))
//		{
//			$model->attributes=$_POST['Competition'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->id));
//		}
//
//		$this->render('create',array(
//			'model'=>$model,
//		));
//	}
//
//	/**
//	 * Updates a particular model.
//	 * If update is successful, the browser will be redirected to the 'view' page.
//	 * @param integer $id the ID of the model to be updated
//	 */
//	public function actionUpdate($id)
//	{
//		$model=$this->loadModel($id);
//
//		// Uncomment the following line if AJAX validation is needed
//		// $this->performAjaxValidation($model);
//
//		if(isset($_POST['Competition']))
//		{
//			$model->attributes=$_POST['Competition'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->id));
//		}
//
//		$this->render('update',array(
//			'model'=>$model,
//		));
//	}
//
//	/**
//	 * Deletes a particular model.
//	 * If deletion is successful, the browser will be redirected to the 'admin' page.
//	 * @param integer $id the ID of the model to be deleted
//	 */
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
            $criteria->condition = 't.type = 2 AND t.archive = 2';
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
            
            $criteria = new CDbCriteria;
            $criteria->condition = 't.competition_id =' . $id;
            
            $count=CompetitionRequest::model()->count($criteria);
            
            $request=new CActiveDataProvider('CompetitionRequest', array(
                'criteria' => $criteria,
                    'pagination'=>array(
                        'pageSize'=>$count,
                    ),
                ));
            
            
            $this->widget('application.extensions.EExcelWriter.EExcelWriter', array(
                'dataProvider' => $request,
                'title'        => 'qwerrs',
                'stream'       => true,
                'fileName'     => 'test.xlsx',
                'columns' => array(
                    array(
                        'name' => 'group_id',
                        'type' => 'raw',
                        'value' => '$data->getGroupName()',
                        'filter' => false,
                    ),
                    'name',
                    'lastname',
                    'year',
                    'sity',
                    'coutry',
                    'participation_data',
                    array(
                        'name' => 'Состояние',
                        'type' => 'raw',
                        'value' => '$data->getNameStatusPrint()',
                        'filter' => false,
                    ),
                    array(
                        'name' => 'Представитель',
                        'type' => 'raw',
                        'value' => '$data->getNameUserPrint()',
                        'filter' => false,
                    ),
                ),
            ));

//            
//            $id = array();
//            $pdf = Yii::createComponent('application.extensions.ETcPdf.ETcPdf',
//            'P', 'cm', 'A4', true, 'UTF-8');
//
//        $site_logo = "/core/logo.png";
//
//        $pdf->SetHeaderData(PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE);
//        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
//
//        $pdf->SetMargins(1, 2, 1);
//        $pdf->SetHeaderMargin(0.1);
//        $pdf->SetFooterMargin(1);
//
//        $pdf->SetFont("dejavusans", "", 10);
//
//        $pdf->AddPage();
//        $renders_mass = array(
//                            'id' => 'competition-request-grid',
//                            'dataProvider' => $request,
//                            'template' => '{pager}{items}{pager}',
//                            'columns' => array(
//                                'id',
//                                array(
//                                    'name' => 'group_id',
//                                    'type' => 'raw',
//                                    'value' => '$data->getGroupName()',
//                                    'filter' => false,
//                                ),
//                                'name',
//                                'lastname',
//                                'year',
//                                'sity',
//                                'coutry',
//                                'participation_data',
//                                array(
//                                    'name' => 'Состояние',
//                                    'type' => 'raw',
//                                    'value' => '$data->getNameStatus()',
//                                    'filter' => false,
//                                ),
//                                array(
//                                    'name' => 'Представитель',
//                                    'type' => 'raw',
//                                    'value' => '$data->getNameUser()',
//                                    'filter' => false,
//                                ),
//                            ),
//                        );
//
//        $this->layout = '//layouts/empty_backend';
//        $html = $this->render("/layouts/details_to_print", compact('renders_mass'),true);
//        
////        echo $html; 
//        
//        $pdf->writeHTML($html, true, false, true, false, '');
//
//        $order_ditails_filename = 'offer_details_1.pdf';
//
//        $pdf->Output($order_ditails_filename, "I");
//            $request1 = $this->widget('zii.widgets.grid.CGridView', $renders_mass);
        }
        
}
