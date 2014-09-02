<?php
/* @var $this SlidersController */
/* @var $model Sliders */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sliders-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array(
               'enctype' => 'multipart/form-data',
        ),
)); ?>

	<p class="note">Обязательные <span class="required">*</span> поля.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alt'); ?>
		<?php echo $form->textField($model,'alt',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'alt'); ?>
	</div>

		
         <div class="field">
            <?php echo $model->getPhoto(); ?>
            <?php if($model->path): ?>
                <p><?php echo CHtml::encode($model->path); ?></p>
            <?php endif; ?>
            <?php echo $form->labelEx($model,'path'); ?>
            <?php echo $form->fileField($model,'path'); ?>
            <?php echo $form->error($model,'path'); ?>
        </div>  

	<div class="row">
		<?php echo $form->labelEx($model,'hedline'); ?>
		<?php echo $form->textField($model,'hedline',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'hedline'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'СОЗДАТЬ' : 'СОХРАНИТЬ'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->