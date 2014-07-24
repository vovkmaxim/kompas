<?php
/* @var $this GroupPhotoController */
/* @var $model GroupPhoto */

$this->breadcrumbs=array(
	'Group Photos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GroupPhoto', 'url'=>array('index')),
	array('label'=>'Manage GroupPhoto', 'url'=>array('admin')),
);
?>

<h1>Create GroupPhoto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>