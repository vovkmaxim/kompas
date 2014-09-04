<?php
/* @var $this PhotoController */
/* @var $data Photo */
?>

<!--<div class="view">-->

<a class="fancybox" href="/photo/<?php echo CHtml::encode($data->path); ?>" data-fancybox-group="gallery" title="<?php echo CHtml::encode($data->title); ?>">
    <img width="147" height="115" src="/photo/<?php echo CHtml::encode($data->path); ?>" alt="<?php echo CHtml::encode($data->title); ?>" />
</a>
