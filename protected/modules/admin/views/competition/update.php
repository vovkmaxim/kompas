<?php
/* @var $this CompetitionController */
/* @var $model Competition */

$this->breadcrumbs=array(
	'Событие'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновить событие</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>