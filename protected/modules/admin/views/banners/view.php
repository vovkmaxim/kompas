<?php
/* @var $this BannersController */
/* @var $model Banners */

$this->breadcrumbs=array(
	'Банеры'=>array('index'),
	$model->name,
);

$this->menu=array(
        array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Банер №<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'position',
		'link',
		'path',
	),
)); ?>
