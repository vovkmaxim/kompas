<?php
/* @var $this TimersController */
/* @var $model Timers */

$this->breadcrumbs=array(
	'Таймер'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'timer_date',
		'titles',
	),
)); ?>
