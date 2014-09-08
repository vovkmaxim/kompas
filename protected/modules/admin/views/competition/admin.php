<?php
/* @var $this CompetitionController */
/* @var $model Competition */

$this->breadcrumbs=array(
	'Событие'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Создать событие', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#competition-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'competition-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'description',
                array(
                    'name' => 'type',
                    'type' => 'raw',
                    'value' => '$data->getTypeList()',
                    'filter' => false,
                ),
                array(
                    'name' => 'logo_desc',
                    'type' => 'raw',
                    'value' => '$data->getLogoImage()',
                    'filter' => false,
                ),
//		'text',		
//		'create_date',
//		'update_date',
		'start_data',
//		'start_time',
		'end_data',
//		'end_time',
		'close_registration_data',
//		'close_registration_time',
//		'enable_registration_flag',
//		'position',
//		'archive',		
		array(
			'class'=>'CButtonColumn',
                        'htmlOptions' => array(
                                "width" => 80,
                            ),
		),
	),
)); ?>
