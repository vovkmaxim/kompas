<?php
/* @var $this PhotoController */
/* @var $model Photo */
/* @var $form CActiveForm */
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'photo-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array(
               'enctype' => 'multipart/form-data',
           ),
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

	
         <div class="field">
            <?php if($model->path): ?>
                <p><?php echo CHtml::encode($model->path); ?></p>
            <?php endif; ?>
            <?php echo $form->labelEx($model,'path'); ?>
            <p>Разрешенные форматы: jpg, jpeg, gif, png</p>
            <span class="button7"><p>ЗАГРУЗИТЬ КАРТИНКУ</p><?php echo $form->fileField($model,'path'); ?></span>
            <!--<span class="button7"><?php // echo $form->fileField($model,'path'); ?></span>-->
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
		<?php echo $form->hiddenField($model,'user_id',array('size'=>'50','value'=> Yii::app()->user->id )); ?>
	<div class="row buttons">
            <input class="knopka" type="submit" value="<?php if($model->isNewRecord){echo 'СОЗДАТЬ';} else { echo 'СОХРАНИТЬ';} ?>" />
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->