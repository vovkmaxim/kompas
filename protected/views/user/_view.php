<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">
    
     <h3><?php echo CHtml::encode($data->name); ?></h3>
        <div class="row">
            <div class="small-9 columns">
                
	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('data_birth')); ?>:</b>
	<?php echo CHtml::encode($data->data_birth); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sity')); ?>:</b>
	<?php echo CHtml::encode($data->sity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coutry')); ?>:</b>
	<?php echo CHtml::encode($data->coutry); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('club')); ?>:</b>
	<?php echo CHtml::encode($data->club); ?>
	<br />
            </div>
        </div>
<!--    
<?php 
if( $data->status != 0 && $data->member != 0 ){
?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastname')); ?>:</b>
	<?php echo CHtml::encode($data->lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_birth')); ?>:</b>
	<?php echo CHtml::encode($data->data_birth); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sity')); ?>:</b>
	<?php echo CHtml::encode($data->sity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coutry')); ?>:</b>
	<?php echo CHtml::encode($data->coutry); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('club')); ?>:</b>
	<?php echo CHtml::encode($data->club); ?>
	<br />
<?php 
}
?>
        -->
</div>