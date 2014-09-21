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

//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$('#competition-grid').yiiGridView('update', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
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
                array(
                    'name' => 'start_data',
                    'type' => 'raw',
                    'value' => '$data->explodeThisDate($data->start_data)',
                    'filter' => false,
                ),
//		'start_time',
                array(
                    'name' => 'end_data',
                    'type' => 'raw',
                    'value' => '$data->explodeThisDate($data->end_data)',
                    'filter' => false,
                    ),
//		'end_time',
                array(
                     'name' => 'close_registration_data',
                     'type' => 'raw',
                     'value' => '$data->explodeThisDate($data->close_registration_data)',
                     'filter' => false,
                    ),
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
