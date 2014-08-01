<?php
/* @var $this CompetitionRequestController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Competition Requests',
);

$this->menu=array(
	array('label'=>'Create CompetitionRequest', 'url'=>array('create')),
	array('label'=>'Manage CompetitionRequest', 'url'=>array('admin')),
);
?>

<h1>Competition Requests</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
