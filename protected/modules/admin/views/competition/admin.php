<?php
/* @var $this CompetitionController */
/* @var $model Competition */

$this->breadcrumbs=array(
	'Competitions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Competition', 'url'=>array('index')),
	array('label'=>'Create Competition', 'url'=>array('create')),
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

<h1>Manage Competitions</h1>

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
		'logo_desc',
		'text',
		/*
		'create_date',
		'update_date',
		'start_data',
		'start_time',
		'end_data',
		'end_time',
		'close_registration_data',
		'close_registration_time',
		'enable_registration_flag',
		'position',
		'archive',
		*/
		array(
			'class'=>'CButtonColumn',
                        'htmlOptions' => array(
                                "width" => 80,
                            ),
		),
	),
)); ?>
