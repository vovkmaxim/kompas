<?php
/* @var $this CompetitionRequestController */
/* @var $model CompetitionRequest */

$this->breadcrumbs=array(
	'Заявления'=>array('index'),
	'Управление',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#competition-request-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'competition-request-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
                    'name' => 'competition_id',
                    'type' => 'raw',
                    'value' => '$data->getCompetitionTitle()',
                    'filter' => false,
                ),
                array(
                    'name' => 'group_id',
                    'type' => 'raw',
                    'value' => '$data->getGroupName()',
                    'filter' => false,
                ),
		'name',
		'lastname',
		'year',		
		'chip',
		'dyusch',
		'sity',
		'coutry',
		'team',
		'coach',
		'fst',
		'participation_data',
		array(
                    'name' => 'status',
                    'type' => 'raw',
                    'value' => '$data->getNameStatus()',
                    'filter' => false,
                ),
                array(
                    'name' => 'user_id',
                    'type' => 'raw',
                    'value' => '$data->getNameUser()',
                    'filter' => false,
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
