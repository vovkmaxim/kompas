<?php
/* @var $this CompetitionController */
/* @var $model Competition */

$this->breadcrumbs=array(
	'Competitions'=>array('index'),
	$model->title,
);

?>
<div class="article">
<h1><?php echo $model->title . ' (' . $model->start_data . ' - ' . $model->end_data . ')'     ; ?></h1>
<p>Дата начала: <?php echo $model->start_data; ?>  - время начала: <?php echo $model->start_time; ?></p>
<p>Дата окончания: <?php echo $model->end_data; ?>  - время окончания: <?php echo $model->end_time; ?></p>
<?php echo $model->getLogoImage(); ?>
<p><?php echo $model->text; ?></p>

<?php

if($file != NULL){
    
    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'file-grid',
	'dataProvider'=>$file,
	'columns'=>array(
		'id',
		'name',
                array(
                    'type' => 'raw',
                    'value' => '$data->viewsFile()',
                    'filter' => true,
                    'htmlOptions' => array(
                        "width" => 128,
                    ),
                ),
                array(
                    'type' => 'raw',
                    'value' => '$data->getType()',
                    'filter' => true,
                    'htmlOptions' => array(
                        "width" => 128,
                    ),
                ),
	),
));
    
    
}

?>
<h4>Дата создания: </h4><?php echo $model->create_date; ?></br>

    
<?php
if($model->enable_registration_flag == 1){
    echo 'Окончание регистрации: ' . $model->close_registration_data . ' время' . $model->close_registration_data;
    
    echo '<p>'.CHtml::link('Подать заявку', array('competitionRequest/application', 'id'=>$model->id)).'"</p> ';    
}

if($request != NULL){
 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'competition-request-grid',
	'dataProvider'=>$request,
//	'filter'=>$request,
	'columns'=>array(
		'id',
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
                    'name' => 'Состояние',
                    'type' => 'raw',
                    'value' => '$data->getNameStatus()',
                    'filter' => false,
                ),
                array(
                    'name' => 'Представитель',
                    'type' => 'raw',
                    'value' => '$data->getNameUser()',
                    'filter' => false,
                ),
		
	),
));
}


?>
</div>
