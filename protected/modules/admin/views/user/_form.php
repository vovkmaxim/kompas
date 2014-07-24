<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data_birth'); ?>
		<?php echo $form->textField($model,'data_birth'); ?>
		<?php echo $form->error($model,'data_birth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sity'); ?>
		<?php echo $form->textField($model,'sity',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coutry'); ?>
		<?php echo $form->textField($model,'coutry',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'coutry'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'club'); ?>
		<?php echo $form->textField($model,'club',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'club'); ?>
	</div>

	<div class="row">
            
           
		<?php echo $form->labelEx($model,'status'); ?>
                <?php 
                    echo $form->dropDownList($model,'status',
                    array('0' => 'Не актевирован', 
                          '1' => 'Актевирован', ),
                    array('0' => 'Не актевирован', ));            
                ?>
		<?php // echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member'); ?>
		<?php 
                    echo $form->dropDownList($model,'member',
                    array('0' => 'Не член клуба', 
                          '1' => 'Член клуба', ),
                    array('0' => 'Не член клуба', ));            
                ?>
		
                <?php // echo $form->textField($model,'member'); ?>
		<?php echo $form->error($model,'member'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->