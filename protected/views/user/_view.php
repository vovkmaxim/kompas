<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">
    <div class="row">
        <div class="large-2">
            <div><?php echo $data->getAvatar(); ?></div>
        </div>
        <div class="small-10 columns team-people">
            <h3><?php echo CHtml::encode($data->lastname); ?> <?php echo CHtml::encode($data->name); ?></h3>
            <b><?php echo CHtml::encode($data->getAttributeLabel('data_birth')); ?>:</b>
                <?php echo $data->explodeThisDate($data->data_birth); ?>
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
            <p></p>
        </div>
    </div>
</div>

