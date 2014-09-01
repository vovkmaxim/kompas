<?php
/* @var $this PhotoController */
/* @var $model Photo */

$this->breadcrumbs=array(
	'Фото'=>array('index'),
	'Управление',
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
	$('#photo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление фотографиями</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'photo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'description',
		array(
                    'name' => 'path',
                    'type' => 'raw',
                    'value' => '$data->getPhoto()',
                    'filter' => true,
                    'htmlOptions' => array(
                        "width" => 128,
                    ),
                ),
		array(
                    'name' => 'user_id',
                    'type' => 'raw',
                    'value' => '$data->getUserName()',
                    'filter' => true,
                    'htmlOptions' => array(
                        "width" => 128,
                    ),
                ),
		array(
                    'name' => 'group_photo_id',
                    'type' => 'raw',
                    'value' => '$data->getGroupPhotoName()',
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
