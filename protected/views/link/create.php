<?php
/* @var $this LinkController */
/* @var $model Link */

$this->breadcrumbs=array(
	'Ссылки'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Создание ссылки</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>