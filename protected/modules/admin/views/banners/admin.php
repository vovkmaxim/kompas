<?php
/* @var $this BannersController */
/* @var $model Banners */

$this->breadcrumbs=array(
	'Banners'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#banners-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление банерами</h1>
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'banners-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
//		'position',
		'link',
                    array(
                    'name' => 'baners',
                    'type' => 'raw',
                    'value' => '$data->getBannerImage()',
                    'filter' => false,
                    'htmlOptions' => array(
                        "width" => 128,
                    ),
                ),
//		'path',
		array(
			'class'=>'CButtonColumn',
                        'htmlOptions' => array(
                                "width" => 80,
                            ),
		),
	),
)); ?>
