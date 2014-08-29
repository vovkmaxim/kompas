<?php
/* @var $this FileController */
/* @var $model File */

$this->breadcrumbs=array(
	'Файл'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Файл</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
		'name',
		'path',
//		'type',
//		'events_id',
//		'competition_id',
	),
)); ?>
