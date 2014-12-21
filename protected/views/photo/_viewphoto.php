<?php
/* @var $this PhotoController */
/* @var $data Photo */
?>
<!--class="th radius"-->
<!--<div class="view">-->
<a class="fancybox th radius" rel="gallery1" href="/photo/<?php echo CHtml::encode($data->path); ?>" title="<?php echo CHtml::encode($data->title) . ' - ' . CHtml::encode($data->description); ?>">
	<img width="147" height="115" src="/thumbn/<?php echo CHtml::encode($data->path); ?>" alt="<?php echo CHtml::encode($data->title); ?>" />
</a>    