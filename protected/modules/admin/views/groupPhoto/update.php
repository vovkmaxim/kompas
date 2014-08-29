<?php
/* @var $this GroupPhotoController */
/* @var $model GroupPhoto */

$this->breadcrumbs=array(
	'Группа фото'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Обновить',
);

$this->menu=array(
	//array('label'=>'List GroupPhoto', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновить группу</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>