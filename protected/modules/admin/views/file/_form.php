<?php
/* @var $this FileController */
/* @var $model File */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'file-form',
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

         <div class="field">
            <?php if($model->path): ?>
                <p><?php echo CHtml::encode($model->path); ?></p>
            <?php endif; ?>
            <?php echo $form->labelEx($model,'path'); ?>
                <p>Разрешенные форматы: doc, docx,xls ,xlsx, odt, pdf,jpg, jpeg, gif, png, bmp</p>
 <span class="button7"><p>ЗАГРУЗИТЬ ФАЙЛ</p><?php echo $form->fileField($model,'path'); ?></span>
           <?php // echo $form->fileField($model,'path'); ?>
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
            <input class="knopka" type="submit" value="<?php if($model->isNewRecord){echo 'СОЗДАТЬ';} else { echo 'СОХРАНИТЬ';} ?>" />
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->