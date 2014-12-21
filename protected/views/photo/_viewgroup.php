<?php
/* @var $this GroupPhotoController */
/* @var $data GroupPhoto */
?>

<span class="view span_view_group_photo">
        <h5><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?></h5>
	<br />
	<?php echo CHtml::encode($data->description); ?>
	<br />
</span>