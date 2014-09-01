<?php
/* @var $this LinkController */
/* @var $model Link */

$this->breadcrumbs=array(
	'Links'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Просмотр</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'path',
	),
)); ?>
