<?php
/* @var $this TimersController */
/* @var $model Timers */

$this->breadcrumbs=array(
	'Таймер'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
);

?>

<h1>Управление таймером</h1>
            <p><span class="required">Для правильной работы таймера укажите дату и время до нужного Вам события.</span></p>
            <p><span class="required">Вид даты: месяц/день/год часы:минуты </span></p>
            <p><span class="required">Пример: 11/10/2014 12:00 --> 10 ноября 2014 года 12 часов 00 минут. </span></p>   
            <br>
            <p>Отчёт ведется до первого опубликованного и сохранённого таймера</p>   
            
            
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'timers-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
                array(
                    'name' => 'status',
                    'type' => 'raw',
                    'value' => '$data->get_status()',
                    'filter' => true,
                ),
		'timer_date',
		'titles',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
