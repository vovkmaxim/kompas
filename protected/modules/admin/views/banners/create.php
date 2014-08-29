<?php
/* @var $this BannersController */
/* @var $model Banners */

$this->breadcrumbs=array(
	'Banners'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Create Banners</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>