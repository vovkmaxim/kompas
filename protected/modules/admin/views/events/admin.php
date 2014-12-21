<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Новости'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
);

?>

<h1>Управление Новостями(Статьями)</h1>

    <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'events-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
                'position',
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
