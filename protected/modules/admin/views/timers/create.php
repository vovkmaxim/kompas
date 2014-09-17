<?php
/* @var $this TimersController */
/* @var $model Timers */

$this->breadcrumbs=array(
	'Таймер'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Создать таймер</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>