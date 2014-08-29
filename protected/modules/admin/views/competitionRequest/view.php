<?php
/* @var $this CompetitionRequestController */
/* @var $model CompetitionRequest */

$this->breadcrumbs=array(
	'Competition Requests'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Просмотр заявки</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
//		'competition_id',
//		'group_id',
		'name',
		'lastname',
		'year',
		'chip',
		'dyusch',
		'sity',
		'coutry',
		'team',
		'coach',
		'fst',
		'participation_data',
//		'status',
//		'user_id',
	),
)); ?>
