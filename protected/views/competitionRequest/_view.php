<?php
/* @var $this CompetitionRequestController */
/* @var $data CompetitionRequest */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('competition_id')); ?>:</b>
	<?php echo CHtml::encode($data->competition_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group_id')); ?>:</b>
	<?php echo CHtml::encode($data->group_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastname')); ?>:</b>
	<?php echo CHtml::encode($data->lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chip')); ?>:</b>
	<?php echo CHtml::encode($data->chip); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('dyusch')); ?>:</b>
	<?php echo CHtml::encode($data->dyusch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sity')); ?>:</b>
	<?php echo CHtml::encode($data->sity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coutry')); ?>:</b>
	<?php echo CHtml::encode($data->coutry); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team')); ?>:</b>
	<?php echo CHtml::encode($data->team); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coach')); ?>:</b>
	<?php echo CHtml::encode($data->coach); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fst')); ?>:</b>
	<?php echo CHtml::encode($data->fst); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('participation_data')); ?>:</b>
	<?php echo CHtml::encode($data->participation_data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	*/ ?>

</div>