<?php
/* @var $this TimersController */
/* @var $data Timers */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
        <?php echo $data->get_status(); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timer_date')); ?>:</b>
	<?php echo CHtml::encode($data->timer_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titles')); ?>:</b>
	<?php echo CHtml::encode($data->titles); ?>
	<br />


</div>