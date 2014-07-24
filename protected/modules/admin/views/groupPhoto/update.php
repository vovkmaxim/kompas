<?php
/* @var $this GroupPhotoController */
/* @var $model GroupPhoto */

$this->breadcrumbs=array(
	'Group Photos'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List GroupPhoto', 'url'=>array('index')),
	array('label'=>'Create GroupPhoto', 'url'=>array('create')),
	array('label'=>'View GroupPhoto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GroupPhoto', 'url'=>array('admin')),
);
?>

<h1>Update GroupPhoto <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>