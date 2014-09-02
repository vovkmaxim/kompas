<?php
/* @var $this QuoteController */
/* @var $model Quote */

$this->breadcrumbs=array(
	'Цитаты(Высказывания)'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Просмотр Цитаты(Высказывания)</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'quote',
		'author_quote',
		'create_date',
		'update_date',
	),
)); ?>
