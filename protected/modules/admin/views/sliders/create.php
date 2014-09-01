<?php
/* @var $this SlidersController */
/* @var $model Sliders */

$this->breadcrumbs=array(
	'Слайдер'=>array('index'),
	'Добавить слайдкр',
);

$this->menu=array(
	array('label'=>'Менеджер слайдера', 'url'=>array('admin')),
);
?>

<h1>Добавление слейдера</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>