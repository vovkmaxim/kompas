<?php
/* @var $this GroupController */
/* @var $model Group */

$this->breadcrumbs=array(
	'Группа'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Просмотр группы</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
		'name',
		'description',
//		'parent_id',
	),
)); ?>
