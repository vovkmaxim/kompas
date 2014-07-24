<?php
/* @var $this RankController */
/* @var $model Rank */

$this->breadcrumbs=array(
	'Ranks'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
//	array('label'=>'List Rank', 'url'=>array('index')),
	array('label'=>'Create Rank', 'url'=>array('create')),
	array('label'=>'View Rank', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Rank', 'url'=>array('admin')),
);
?>

<h1>Update Rank <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>