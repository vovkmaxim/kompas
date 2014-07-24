<?php
/* @var $this RankController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ranks',
);

$this->menu=array(
	array('label'=>'Create Rank', 'url'=>array('create')),
	array('label'=>'Manage Rank', 'url'=>array('admin')),
);
?>

<h1>Ranks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
