<?php
/* @var $this EventsController */
/* @var $data Events */
?>

<div class="news">
    <li>
        <p class="title-p" ><span class="title-span"><?php echo CHtml::encode($data->title); ?></span><span class="more create-data"><?php echo CHtml::encode($data->create_date); ?></span></p>
        <?php echo  $data->getFileForThisEvents();?>
        <div class="row">
            <div class="small-3 large-4 columns">
                <a class="fancybox th radius" href="/index.php/events/view/<?php echo $data->id; ?>">
                    <img width="147" height="115" src="/logo_events/<?php echo CHtml::encode($data->logo_path); ?>" alt="<?php echo CHtml::encode($data->title); ?>" />
                </a>
               
            </div>
            <div class="small-8 columns">
                <?php echo CHtml::encode($data->description); ?>
            </div>
            <div class="more">
                <div class="small-12 text-right"><?php echo CHtml::link(CHtml::encode('Детальнее...'), array('events/view', 'id'=>$data->id)); ?></div>
            </div>
        </div>
    </li>
    
<!--
    <?php
        if($data->status != 2 && $data->type !=2){
    ?>
    
    	<?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?>
	<br />
        

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
        <br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php echo CHtml::encode($data->author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text')); ?>:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo_title')); ?>:</b>
	<?php echo CHtml::encode($data->logo_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo_path')); ?>:</b>
	<?php echo $data->getEventsImage(); ?>
	<br />
-------------------------------------------------------------</br>
	<b>Количество комментариев:</b>
	<?php echo $data->getCommentCount(); ?>
	<br />
	<b>Количество просмотров:</b>
	<?php echo $data->views; ?>
	<br />
    <?php
    }    
    ?> -->

</div>