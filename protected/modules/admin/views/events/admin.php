<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Новости'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Создат', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#events-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление Новостями(Статьями)</h1>

    <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'events-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
                 array(
                    'name' => 'Logo',
                    'type' => 'raw',
                    'value' => '$data->getEventsImage()',
                    'filter' => false,
                ),
                 array(
                    'name' => 'status',
                    'type' => 'raw',
                    'value' => '$data->getStatusForViews()',
                    'filter' => false,
                ),
                 array(
                    'name' => 'type',
                    'type' => 'raw',
                    'value' => '$data->getTypeForViews()',
                    'filter' => false,
                ),
		'title',
		'description',
		'author',
		'create_date',
                'update_date',
		/*
		'update_date',
		'position',
		'text',
		'logo_title',
		'logo_path',
		*/
		array(
			'class'=>'CButtonColumn',
                        'htmlOptions' => array(
                                "width" => 80,
                            ),
		),
	),
)); ?>
