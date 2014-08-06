<?php
/* @var $this CompetitionRequestController */
/* @var $model CompetitionRequest */

$this->breadcrumbs=array(
	'Competition Requests'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CompetitionRequest', 'url'=>array('index')),
	array('label'=>'Create CompetitionRequest', 'url'=>array('create')),
	array('label'=>'Update CompetitionRequest', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CompetitionRequest', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CompetitionRequest', 'url'=>array('admin')),
);
?>

<h1>View CompetitionRequest #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'competition_id',
		'group_id',
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
		'status',
		'user_id',
	),
)); ?>
