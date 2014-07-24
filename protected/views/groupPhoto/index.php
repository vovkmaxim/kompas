<?php
/* @var $this GroupPhotoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Group Photos',
);

$this->menu=array(
	array('label'=>'Create GroupPhoto', 'url'=>array('create')),
	array('label'=>'Manage GroupPhoto', 'url'=>array('admin')),
);
?>

<h1>Group Photos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
