<?php
/* @var $this QuoteController */
/* @var $data Quote */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quote')); ?>:</b>
	<?php echo CHtml::encode($data->quote); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author_quote')); ?>:</b>
	<?php echo CHtml::encode($data->author_quote); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />


</div>