<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Просмотр Новости(Статьи)</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
//		'type',
		'title',
		'description',
		'author',
		'create_date',
		'update_date',
//		'position',
		'text',
//		'logo_title',
//		'logo_path',
	),
)); ?>
