<?php
/* @var $this CompetitionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Соревнования',
);

?>

<h1>Соревнования</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
