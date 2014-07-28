<?php
/* @var $this PhotoController */
/* @var $model Photo */
/* @var $form CActiveForm */
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'photo-form',
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
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
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
		<?php echo $form->labelEx($model,'group_photo_id'); ?>
		<?php 
                    echo CHtml::dropDownList('group_photo_id', $model, 
                              $model->getAllGroupPhotoList(),
                              array('0' => ''));
                ?>
		<?php echo $form->error($model,'group_photo_id'); ?>
	</div>

	<div class="row">
		<?php // echo $form->labelEx($model,'user_id'); ?>
		<?php // echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->hiddenField($model,'user_id',array('size'=>'50','value'=> Yii::app()->user->id )); ?>
		<?php // echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->