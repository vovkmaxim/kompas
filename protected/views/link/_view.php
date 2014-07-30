<?php
/* @var $this LinkController */
/* @var $data Link */
?>

<div class="view">

        <h3><?php echo CHtml::encode($data->name); ?></h3>
	<br />

	<?php echo CHtml::encode($data->description); ?>
	<br />

        <a href="<?php echo CHtml::encode($data->path); ?>" ><?php echo CHtml::encode($data->path); ?></a>
	<br />


</div>