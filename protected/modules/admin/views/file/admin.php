<?php
/* @var $this FileController */
/* @var $model File */

$this->breadcrumbs=array(
	'Файл'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Добавить', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#file-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управлене файлами</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'file-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
                array(
                    'name' => 'path',
                    'type' => 'raw',
                    'value' => '$data->viewsFile()',
                    'filter' => true,
                    'htmlOptions' => array(
                        "width" => 128,
                    ),
                ),
                array(
                    'name' => 'type',
                    'type' => 'raw',
                    'value' => '$data->getType()',
                    'filter' => true,
                    'htmlOptions' => array(
                        "width" => 128,
                    ),
                ),
                array(
                    'name' => 'events_id',
                    'type' => 'raw',
                    'value' => '$data->getNameEvents()',
                    'filter' => true,
                    'htmlOptions' => array(
                        "width" => 128,
                    ),
                ),
                array(
                    'name' => 'competition_id',
                    'type' => 'raw',
                    'value' => '$data->getNameCompetition()',
                    'filter' => true,
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
