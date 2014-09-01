<?php
/* @var $this PhotoController */
/* @var $model Photo */

$this->breadcrumbs=array(
	'Фото'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Добавить фото</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>