<?php
/* @var $this LinkController */
/* @var $data Link */
?>
<div class="row">
    <div class="links_blok">
        <div class="small-3 large-3 columns">
            <a class="th radius" href="#"><?php echo $data->getImage(); ?></a>
        </div>
        <div class="small-9 columns links">
            <h3><?php echo CHtml::encode($data->name); ?></h3>
            <p><?php echo CHtml::encode($data->description); ?></p>
            <a href="<?php echo CHtml::encode($data->path); ?>" ><?php echo CHtml::encode($data->path); ?></a>
        </div>
    </div>
</div>