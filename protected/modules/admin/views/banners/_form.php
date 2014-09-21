<?php
/* @var $this BannersController */
/* @var $model Banners */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'banners-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
        ),
)); ?>

	<p class="note">Обязательные <span class="required">*</span> поля.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<!--<div class="row">-->
		<?php // echo $form->labelEx($model,'position'); ?>
            <input type="hidden" name="position" id="position" value="0" />
		<?php // echo $form->textField($model,'position',array('size'=>10,'maxlength'=>10)); ?>
		<?php // echo $form->error($model,'position'); ?>
	<!--</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textArea($model,'link',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>
	<div class="row">
            <?php if($model->path): ?>
                <p><?php echo CHtml::encode($model->path); ?></p>
                <?php echo $model->getBannerImage(); ?>
                
            <?php endif; ?>
            <?php echo $form->labelEx($model,'path'); ?>
            <p>Разрешенные форматы: jpg, jpeg, gif, png, bmp</p>
            <span class="button7"><p>ЗАГРУЗИТЬ КАРТИНКУ</p><?php echo $form->fileField($model,'path'); ?></span>
            <?php echo $form->error($model,'path'); ?>
	</div>
	<div class="row buttons">
            <input class="knopka" type="submit" value="<?php if($model->isNewRecord){echo 'СОЗДАТЬ';} else { echo 'СОХРАНИТЬ';} ?>" />
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->