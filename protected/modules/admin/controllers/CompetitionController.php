<?php

class CompetitionController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
//        private $path_directory_thumbn = 'thumbn/';
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


        public function actionExcel(){
            
            $criteria = new CDbCriteria;
            $criteria->condition = 't.competition_id =' . 4;
            
            $count=CompetitionRequest::model()->count($criteria);
            
            $request=new CActiveDataProvider('CompetitionRequest', array(
                'criteria' => $criteria,
                    'pagination'=>array(
                        'pageSize'=>$count,
                    ),
                ));
            
            $id = array();
            $pdf = Yii::createComponent('application.extensions.ETcPdf.ETcPdf',
            'P', 'cm', 'A4', true, 'UTF-8');

//        $site_logo = "/core/logo.png";

//        $pdf->SetHeaderData(PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE);
//        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetMargins(1, 2, 1);
        $pdf->SetHeaderMargin(0.1);
        $pdf->SetFooterMargin(1);

        $pdf->SetFont("dejavusans", "", 10);

        $pdf->AddPage();
        $renders_mass = array(
                            'id' => 'competition-request-grid',
                            'dataProvider' => $request,
                            'template' => '{pager}{items}{pager}',
                            'columns' => array(
                                'id',
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
                        );

        $this->layout = '//layouts/empty_backend';
        $html = $this->render("/layouts/details_to_print", compact('renders_mass'),true);
        
//        echo $html; 
        
        $pdf->writeHTML($html, true, false, true, false, '');

        $order_ditails_filename = 'offer_details_1.pdf';

        $pdf->Output($order_ditails_filename, "I");
//            $request1 = $this->widget('zii.widgets.grid.CGridView', $renders_mass);
        }
        
        
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Competition;

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
			if($model->save()){
                            $model->position = $model->id;
                            $model->save();
                            $this->setCompetitionGroupRefs($model->id);
                            return $this->actionAdmin();
                        }
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

        private function setCompetitionGroupRefs($km_competition_id){
            $all_group = Group::model()->findAll();
            if($all_group != NULL){                
                    foreach($all_group as $all_groups){
                        $CompetitionGroupRefs = CompetitionGroupRefs::model()->find("km_group_id=:find_id_in_post1 AND km_competition_id=:km_competition_id", array(":find_id_in_post1" => $all_groups->id, ":km_competition_id" => $km_competition_id));
                        if($CompetitionGroupRefs != NULL){
                            $CompetitionGroupRefs->delete();
                        }            
                    }
                    foreach($all_group as $all_groups){
                        $find_id_in_post = "grop_" . $all_groups->id . "";
                        if(isset($_POST[$find_id_in_post])){                        
                                $competition_group_refs = new CompetitionGroupRefs();
                                $competition_group_refs->km_group_id = $_POST[$find_id_in_post];
                                $competition_group_refs->km_competition_id = $km_competition_id;
                                $competition_group_refs->save();                        
                        }
                     }                
            }
        }
        
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
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
                        $model->position = $_POST['Competition']['position'];
                        $model->confirmation = $_POST['confirmation'];
//                        print_r('<pre>');
//                        print_r($_POST);
//                        print_r('</pre>');
//                        die();
			$model->attributes=$_POST['Competition'];
			if($model->save()){
                            $this->setCompetitionGroupRefs($model->id);
                            return $this->actionAdmin();
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
        
                           
        /**
         * 
         * @param type $src
         * @param type $dest
         * @param type $width
         * @param type $height
         * @param type $rgb
         * @param type $quality
         * @return boolean
         */
        public function img_resize($src, $dest, $width, $height, $rgb = 0xFFFFFF, $quality = 100) {  
                    if (!file_exists($src)) {  
                        return false;  
                    }  
                    $size = getimagesize($src);   
                    if ($size === false) {  
                        return false;  
                    }   
                    $format = strtolower(substr($size['mime'], strpos($size['mime'], '/') + 1));  
                    $icfunc = 'imagecreatefrom'.$format;  
                    if (!function_exists($icfunc)) {  
                        return false;  
                    }   
                    $x_ratio = $width  / $size[0];  
                    $y_ratio = $height / $size[1]; 
                    if ($height == 0) {   
                        $y_ratio = $x_ratio;  
                        $height  = $y_ratio * $size[1];   
                    } elseif ($width == 0) {   
                        $x_ratio = $y_ratio;  
                        $width   = $x_ratio * $size[0];   
                    }   
                    $ratio       = min($x_ratio, $y_ratio);  
                    $use_x_ratio = ($x_ratio == $ratio);   
                    $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);  
                    $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);  
                    $new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width)   / 2);  
                    $new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);  
                    $isrc  = $icfunc($src);  
                    $idest = imagecreatetruecolor($width, $height);   
                    imagefill($idest, 0, 0, $rgb);   
                    imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0, $new_width, $new_height, $size[0], $size[1]);  
                    imagejpeg($idest, $dest, $quality); 
                    imagedestroy($isrc);  
                    imagedestroy($idest);   
                    return true;  
        }
        
}
