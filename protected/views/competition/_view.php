<?php
/* @var $this CompetitionController */
/* @var $data Competition */
?>

<div class="view">

        <?php echo CHtml::link(CHtml::encode($data->title  . ' (' . $data->start_data . ' - ' . $data->end_data . ')'), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />
	<?php echo $data->getLogoImage(); ?>
	<br />
	<b>Опубликовано:</b>
	<?php echo CHtml::encode($data->create_date) . ';'; ?>    
        <?php 
        
        if($data->enable_registration_flag == 1){
            echo '<b>Окончание онлайн регистраци : </b>' . $data->close_registration_data . '-' . $data->close_registration_time . ';';
        }
        
        ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('enable_registration_flag')); ?>:</b>
	<?php 
        if($data->enable_registration_flag){
            echo 'Да';
        } else {
            echo 'Нет';
        }
        
        ?>
	<br />
        Количество просмотров: <?php echo $data->views; ?></br>
        Количество комментариев: <?php echo $data->getCommentCount(); ?></br>
        Количество заявок: <?php echo $data->getCountRequest(); ?></br>
        <?php echo CHtml::link(CHtml::encode('Читать дальше ...'), array('view', 'id'=>$data->id)); ?>
	<br />
</div>