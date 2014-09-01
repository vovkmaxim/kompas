<?php
/* @var $this LinkController */
/* @var $model Link */

$this->breadcrumbs=array(
	'Ссылки'=>array('index'),
	'Управление',
);

$this->menu=array(
	//array('label'=>'List Link', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#link-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'link-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'description',
		'path',
		array(
			'class'=>'CButtonColumn',
                        'htmlOptions' => array(
                                "width" => 80,
                            ),
		),
	),
)); ?>
