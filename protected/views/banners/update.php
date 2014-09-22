<?php
/* @var $this BannersController */
/* @var $model Banners */

$this->breadcrumbs=array(
	'Банера'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Управлние', 'url'=>array('admin')),
);
?>

<h1>Обновить банер</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>