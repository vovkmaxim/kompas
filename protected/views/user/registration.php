<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-registration-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Поля для обезательного заполнения <span class="required">*</span>.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php // echo date('y-m-d') ?>
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname'); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone'); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sity'); ?>
		<?php echo $form->textField($model,'sity'); ?>
		<?php echo $form->error($model,'sity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coutry'); ?>
		<?php echo $form->textField($model,'coutry'); ?>
		<?php echo $form->error($model,'coutry'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'club'); ?>
		<?php echo $form->textField($model,'club'); ?>
		<?php echo $form->error($model,'club'); ?>
	</div>

	<div class="row">
		<label class="required" for="User_data_birth">Дата рождения<span class="required">*</span></label>
                <p>Формат даты: гггг-мм-дд (1984-01-31)</p>
		<?php echo $form->textField($model,'data_birth'); ?>
		<?php echo $form->error($model,'data_birth'); ?>
	</div>
<!--        <div class="row">
		<?php // echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php // $this->widget('CCaptcha'); ?>
		<?php // echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php // echo $form->error($model,'verifyCode'); ?>
	</div>-->

        <div class="row buttons">
                            <input class="button8" type="submit" value="РЕГИСТРАЦИЯ" />
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->