<?php
/* @var $this CompetitionRequestController */
/* @var $model CompetitionRequest */

$this->breadcrumbs=array(
	'Competition Requests'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CompetitionRequest', 'url'=>array('index')),
	array('label'=>'Create CompetitionRequest', 'url'=>array('create')),
	array('label'=>'View CompetitionRequest', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CompetitionRequest', 'url'=>array('admin')),
);
?>

<h1>Update CompetitionRequest <?php echo $model->id; ?></h1>

<?php $this->renderPartial('/competitionRequest/_form', array('model'=>$model)); ?>