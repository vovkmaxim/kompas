<?php
/* @var $this SlidersController */
/* @var $model Sliders */

$this->breadcrumbs=array(
	'Слайдер'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Добавить слайд', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sliders-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление слайдера</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sliders-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'link',
		'alt',
		array(
                    'name' => 'path',
                    'type' => 'raw',
                    'value' => '$data->getPhoto()',
                    'filter' => true,
                    'htmlOptions' => array(
                        "width" => 128,
                    ),
                ),
		'hedline',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
