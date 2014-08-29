<?php
/* @var $this GroupController */
/* @var $model Group */

$this->breadcrumbs=array(
	'Группа'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновить группу</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>