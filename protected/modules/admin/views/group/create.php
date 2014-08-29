<?php
/* @var $this GroupController */
/* @var $model Group */

$this->breadcrumbs=array(
	'Группа'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Создать группу</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>