<?php
/* @var $this TimersController */
/* @var $model Timers */

$this->breadcrumbs=array(
	'Таймер'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Одновить',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Управлени', 'url'=>array('admin')),
);
?>

<h1>Обновить</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>