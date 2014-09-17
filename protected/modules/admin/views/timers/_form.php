<?php
/* @var $this TimersController */
/* @var $model Timers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'timers-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Обязательные <span class="required">*</span> поля.</p>
            <p><span class="required">Для правельной работы таймера укажите дату и время до нужного Вам события.</span></p>
            <p><span class="required">Вид даты: месяц/день/год часы:минуты </span></p>
            <p><span class="required">Пример: 11/10/2014 12:00 --> 10 ноября 2014 года 12 часов 00 минут. </span></p>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $model->get_status_this_list(); ?>
		<?php // echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'timer_date'); ?>
            	<?php echo $form->textField($model,'timer_date',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'timer_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'titles'); ?>
		<?php echo $form->textField($model,'titles',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'titles'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->