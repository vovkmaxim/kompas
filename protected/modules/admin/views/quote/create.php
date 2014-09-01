<?php
/* @var $this QuoteController */
/* @var $model Quote */

$this->breadcrumbs=array(
	'Цитаты(Высказывания)'=>array('index'),
	'Создание',
);

$this->menu=array(
	//array('label'=>'List Quote', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Создание Цитаты(Высказывания)</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>