<?php
/* @var $this PhotoController */
/* @var $data Photo */
?>

<div class="view">
    <img width="147" height="115" src="photo/<?php echo CHtml::encode($data->path); ?>" alt="<?php echo CHtml::encode($data->title); ?>" /></br>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b>Разместил:</b>
	<?php echo $data->getUserName(); ?>
	<br />


</div>