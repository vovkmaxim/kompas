<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->title,
);

?>

<h1><?php echo $model->title; ?></h1>



        <?php echo CHtml::encode($model->description); ?>
	<br />
       
        <?php echo CHtml::encode($model->author); ?>
	<br />
        
        <?php echo CHtml::encode($model->create_date); ?>
	<br />
        
        <?php echo CHtml::encode($model->update_date); ?>
	<br />
        
        <?php echo CHtml::encode($model->text); ?>
	<br />
        
        <?php echo $model->getEventsImage(); ?>
	<br />


<?php 

//$this->widget('zii.widgets.CDetailView', array(
//	'data'=>$model,
//	'attributes'=>array(
//		'title',
//		'description',
//		'author',
//		'create_date',
//		'update_date',
//		'text',
//		'logo_path',
//	),
//)); 



?>
