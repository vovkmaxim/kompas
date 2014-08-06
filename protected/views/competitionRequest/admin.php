<?php
/* @var $this CompetitionRequestController */
/* @var $model CompetitionRequest */

$this->breadcrumbs=array(
	'Competition Requests'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CompetitionRequest', 'url'=>array('index')),
	array('label'=>'Create CompetitionRequest', 'url'=>array('create')),
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

<h1>Manage Competition Requests</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'competition-request-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'competition_id',
		'group_id',
		'name',
		'lastname',
		'year',
		/*
		'chip',
		'dyusch',
		'sity',
		'coutry',
		'team',
		'coach',
		'fst',
		'participation_data',
		'status',
		'user_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
