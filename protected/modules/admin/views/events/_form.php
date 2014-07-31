<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(    
	'id'=>'events-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
        ),
)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
                <?php 
                    echo CHtml::dropDownList('type', $model, 
                              array(
                                  1 => "Новость",
                                  2 => "Статья",
                              ),
                              array('2' => 'Статья'));
                ?>
		<?php // echo $form->textField($model,'type',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php 
                    echo CHtml::dropDownList('status', $model, 
                              array(
                                  1 => "Опубликованная",
                                  2 => "Не опубликованная",
                              ),
                              array('2' => 'Статья'));
                ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logo_title'); ?>
		<?php echo $form->textField($model,'logo_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'logo_title'); ?>
	</div>

	<div class="row">
            <?php if($model->logo_path): ?>
                <p><?php echo CHtml::encode($model->logo_path); ?></p>
                <?php echo $model->getEventsImage(); ?>
                
            <?php endif; ?>
            <?php echo $form->labelEx($model,'logo_path'); ?>
            <?php echo $form->fileField($model,'logo_path'); ?>
            <?php echo $form->error($model,'logo_path'); ?>  
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->