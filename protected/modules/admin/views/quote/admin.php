<?php
/* @var $this QuoteController */
/* @var $model Quote */

$this->breadcrumbs=array(
	'Цитаты(Высказывания)'=>array('index'),
	'Управления',
);

$this->menu=array(
	//array('label'=>'List Quote', 'url'=>array('index')),
	array('label'=>'Создание', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#quote-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управления цитатами(высказываниями)</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'quote-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'quote',
		'author_quote',
		'create_date',
		'update_date',
		array(
			'class'=>'CButtonColumn',
                        'htmlOptions' => array(
                                "width" => 80,
                            ),
		),
	),
)); ?>
