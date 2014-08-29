<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Новость'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Создать Новость(Статью)</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>