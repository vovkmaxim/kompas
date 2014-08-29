<?php
/* @var $this CommentsController */
/* @var $model Comments */

$this->breadcrumbs=array(
	'Комментарии'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Править',
);

$this->menu=array(
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Правка комментария</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>