<?php
/* @var $this RankController */
/* @var $model Rank */

$this->breadcrumbs=array(
	'Разряды'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновить разряд</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>