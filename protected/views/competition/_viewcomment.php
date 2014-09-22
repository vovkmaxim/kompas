<?php
/* @var $this CommentsController */
/* @var $data Comments */
?>

<div class="view">

	<span class="date-time"><p><?php echo $data->explodeThisDate($data->create_date). ', ' . $data->explodeThisDateTime($data->create_date); ?></p></span>
	<?php echo CHtml::encode($data->title); ?>
	<br />
	<b>Текст:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />
</div>