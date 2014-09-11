<?php
/* @var $this GroupPhotoController */
/* @var $model GroupPhoto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'group-photo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Обязательные <span class="required">*</span> поля.</p>

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

	<div class="row">
<?php echo $form->labelEx($model,'parent_id'); ?>
<?php echo CHtml::dropDownList('parent_id', $model, $model->getAllParentGroupName(), array('1' => 'ALL')); ?>
	</div>
	<div class="row buttons">
            <input class="knopka" type="submit" value="<?php if($model->isNewRecord){echo 'СОЗДАТЬ';} else { echo 'СОХРАНИТЬ';} ?>" />
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->