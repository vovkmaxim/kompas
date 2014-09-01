<?php
/* @var $this QuoteController */
/* @var $model Quote */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'quote-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Обязательные <span class="required">*</span> поля.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'quote'); ?>
		<?php echo $form->textArea($model,'quote',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'quote'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_quote'); ?>
		<?php echo $form->textField($model,'author_quote',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'author_quote'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'СОЗДАТЬ' : 'СОХРАНИТЬ'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->