<?php
/* @var $this FileController */
/* @var $model File */

$this->breadcrumbs=array(
	'Файл'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Добавить файл</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>