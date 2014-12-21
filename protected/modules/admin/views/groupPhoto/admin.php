<?php
/* @var $this GroupPhotoController */
/* @var $model GroupPhoto */

$this->breadcrumbs=array(
	'Группы фото'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
);

?>

<h1>Управление группами фотографий</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'group-photo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'description',
                array(
                    'name' => 'parent_id',
                    'type' => 'raw',
                    'value' => '$data->getParentGroupName($data->id)',
                    'filter' => false,
                    'htmlOptions' => array(
                        "width" => 128,
                    ),
                ),
		array(
			'class'=>'CButtonColumn',
                        'htmlOptions' => array(
                                "width" => 80,
                            ),
		),
	),
)); ?>
