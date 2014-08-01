<?php
/* @var $this GroupPhotoController */
/* @var $data GroupPhoto */
?>

<div class="view">

	<?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?>
	<br />
	<?php echo CHtml::encode($data->description); ?>
	<br />



</div>