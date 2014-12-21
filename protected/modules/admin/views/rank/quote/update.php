<?php
/* @var $this QuoteController */
/* @var $model Quote */

$this->breadcrumbs=array(
	'Цитаты(Высказывания)'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновление Цитаты(Высказывания)</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>