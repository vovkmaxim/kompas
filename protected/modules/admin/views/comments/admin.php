<?php
/* @var $this CommentsController */
/* @var $model Comments */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comments-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Комментарии</h1>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'comments-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
                array(
                    'name' => 'events_id',
                    'type' => 'raw',
                    'value' => '$data->getEvents()',
                    'filter' => false,
                ),
                array(
                    'name' => 'competition_id',
                    'type' => 'raw',
                    'value' => '$data->getCompetition()',
                    'filter' => false,
                ),	
                array(
                    'name' => 'user_id',
                    'type' => 'raw',
                    'value' => '$data->getUserName()',
                    'filter' => false,
                ),
		'create_date',
		'title',		
		'text',		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
