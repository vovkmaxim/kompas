<?php
/* @var $this RoleController */
/* @var $model Role */

$this->breadcrumbs=array(
	'Роли'=>array('index'),
	'Управление',
);

$this->menu=array(
	//array('label'=>'List Role', 'url'=>array('index')),
	//  array('label'=>'Create Role', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#role-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Роли</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'role-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'role',
//		array(
//			'class'=>'CButtonColumn',
//		),
	),
)); ?>
