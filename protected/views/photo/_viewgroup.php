<?php
/* @var $this GroupPhotoController */
/* @var $data GroupPhoto */
?>

<span class="view span_view_group_photo">

	<?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?>
	<br />
	<?php echo CHtml::encode($data->description); ?>
	<br />



</span>