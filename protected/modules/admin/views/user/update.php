<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'пользователь'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновить пользователя</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>