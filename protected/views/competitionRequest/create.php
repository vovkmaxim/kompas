<?php
/* @var $this CompetitionRequestController */
/* @var $model CompetitionRequest */

$this->breadcrumbs=array(
	'Заявка'=>array('index'),
	'Подать заявку',
);

//$this->menu=array(
//	array('label'=>'List CompetitionRequest', 'url'=>array('index')),
//	array('label'=>'Manage CompetitionRequest', 'url'=>array('admin')),
//);
?>

<h1>Подать заявку</h1>

<?php $this->renderPartial('/competitionRequest/_form', array('model'=>$model)); ?>