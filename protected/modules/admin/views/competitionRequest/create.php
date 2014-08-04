<?php
/* @var $this CompetitionRequestController */
/* @var $model CompetitionRequest */

$this->breadcrumbs=array(
	'Competition Requests'=>array('index'),
	'Create',
);

//$this->menu=array(
//	array('label'=>'List CompetitionRequest', 'url'=>array('index')),
//	array('label'=>'Manage CompetitionRequest', 'url'=>array('admin')),
//);
?>

<h1>Create CompetitionRequest</h1>

<?php $this->renderPartial('/competitionRequest/_form', array('model'=>$model)); ?>