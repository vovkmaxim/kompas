<?php
/* @var $this FileController */
/* @var $model File */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'file-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
        ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

         <div class="field">
            <?php if($model->path): ?>
                <p><?php echo CHtml::encode($model->path); ?></p>
            <?php endif; ?>
            <?php echo $form->labelEx($model,'path'); ?>
            <?php echo $form->fileField($model,'path'); ?>
            <?php echo $form->error($model,'path'); ?>
        </div>
        
<!--	<div class="row">
           <?php
//                if(empty($model->path)){                 
//                    echo $form->labelEx($model,'path'); 
//                    echo CHtml::activeFileField($model,'path'); 
//                    echo $form->error($model,'path');                   
//                } else {
//                    echo $model->getFile();
//                    echo $form->labelEx($model,'path'); 
//                    echo CHtml::activeFileField($model,'path'); 
//                    echo $form->error($model,'path');
//                }
           ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'events_id'); ?>
		<?php echo $form->textField($model,'events_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'events_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'competition_id'); ?>
		<?php echo $form->textField($model,'competition_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'competition_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->