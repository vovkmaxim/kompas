<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	'Управление',
);

//$this->menu=array(
//	array('label'=>'Добавить', 'url'=>array('create')),
//);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
        'pager' => array(
            'pageSize' => 50,
        ),
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'email',
		'username',
		'name',
		'lastname',
		'data_birth',
		'phone',
		'sity',
		'coutry',
		'club',
                array(
                    'name' => 'status',
                    'type' => 'raw',
                    'value' => '$data->getUserStatus($data->id)',
                    'filter' => false,
                ),
                array(
                    'name' => 'member',
                    'type' => 'raw',
                    'value' => '$data->getUserMember($data->id)',
                    'filter' => false,
                ),
                array(
                    'name' => 'Role',
                    'type' => 'raw',
                    'value' => '$data->getRoleUserForAdmins()',
                    'filter' => false,
                    'htmlOptions' => array(
                        "width" => 128,
                    ),
                ),
                array(
                    'name' => 'avatar',
                    'type' => 'raw',
                    'value' => '$data->getAvatar()',
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
