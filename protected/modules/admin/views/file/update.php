<?php
/* @var $this FileController */
/* @var $model File */

$this->breadcrumbs=array(
	'Файл'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Создать',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Изменить файл</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>