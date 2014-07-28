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

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php 
                    echo CHtml::dropDownList('type', $model, 
                              array('0' => ' ', '1' => 'Результаты', '2' => 'Пояснения'),
                              array('2' => 'Пояснения'));
                ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'events_id'); ?>
		<?php 
                    echo CHtml::dropDownList('events_id', $model, 
                              $model->getAllEventsList(),
                              array('0' => ''));
                ?>
		<?php echo $form->error($model,'events_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'competition_id'); ?>
		<?php 
                    echo CHtml::dropDownList('competition_id', $model, 
                              $model->getAllCompetitionList(),
                              array('0' => ''));
                ?>
		<?php echo $form->error($model,'competition_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->