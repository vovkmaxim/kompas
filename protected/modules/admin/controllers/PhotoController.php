<?php

class PhotoController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        private $path_directory_thumbn = 'thumbn/';
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
		$model=new Photo;
		if(isset($_POST['Photo']))
		{
                        $model->group_photo_id=$_POST['group_photo_id'];
			$model->attributes=$_POST['Photo'];
			if($model->save()){
                            $this->img_resize('photo/'.$model->path, $this->path_directory_thumbn . $model->path, 147, 115, '0xFFFFFF', 100);
                            @mkdir($this->path_directory_thumbn . $model->path, 0777);
                            return $this->actionAdmin();
                        }				
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
		if(isset($_POST['Photo']))
		{
                        @unlink($this->path_directory_thumbn . $model->path);
                        $model->group_photo_id=$_POST['group_photo_id'];
			$model->attributes=$_POST['Photo'];
			if($model->save()){
                            $this->img_resize('photo/'.$model->path, $this->path_directory_thumbn . $model->path, 147, 115, '0xFFFFFF', 100);
                            @mkdir($this->path_directory_thumbn . $model->path, 0777);
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
		$model=$this->loadModel($id);
                @unlink($this->path_directory_thumbn . $model->path);
                $model->delete();
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
		$model=new Photo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Photo']))
			$model->attributes=$_GET['Photo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Photo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Photo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Photo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='photo-form')
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
