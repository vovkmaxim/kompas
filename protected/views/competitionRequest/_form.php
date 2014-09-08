<?php
/* @var $this CompetitionRequestController */
/* @var $model CompetitionRequest */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'competition-request-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
        ),
)); ?>
	<p class="note">Обязательные <span class="required">*</span> поля.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->hiddenField($model,'competition_id',array('size'=>10,'maxlength'=>10)); ?>
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
		<?php echo $form->labelEx($model,'year'); ?>
		<?php // echo $form->textField($model,'year',array('size'=>4,'maxlength'=>4)); ?>
                <?php echo $model->getYearInput('year_bird','year'); ?>
                <?php // echo $model->getDataList("monts_bird", 'monts_bird', 12, "Monts");  ?>
                <?php // echo $model->getDataList("day_bird", 'day_bird', 31, "Day");  ?>
		<?php echo $form->error($model,'year'); ?>
                
	</div>       
        
	<div class="row">
            <?php echo $form->labelEx($model,'group_id'); ?>
                <?php 
                    echo CHtml::dropDownList('group_id', $model, 
                              $model->getAllGroupName(),
                              array(0 => ''));
                ?>
            <?php echo $form->error($model,'group_id'); ?>
	</div>        

	<div class="row">
                <label class="required">
                    Разряд
                <span class="required">*</span>
                </label>
                <?php echo $model->getRanksList(); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chip'); ?>
		<?php echo $form->textField($model,'chip',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'chip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dyusch'); ?>
		<?php echo $form->textField($model,'dyusch',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'dyusch'); ?>
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
		<?php echo $form->labelEx($model,'team'); ?>
		<?php echo $form->textField($model,'team',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'team'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coach'); ?>
		<?php echo $form->textField($model,'coach',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'coach'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fst'); ?>
		<?php echo $form->textField($model,'fst',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'fst'); ?>
	</div>

	<div class="row">
		<?php // echo $form->labelEx($model,'participation_data'); ?>
		<?php // echo $form->textField($model,'participation_data',array('size'=>60,'maxlength'=>255)); ?>
		<?php // echo $form->error($model,'participation_data'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'status',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
            <label class="required">
            Укажите дату участия
            <span class="required">*</span>:
            </label>
		<?php 
                print_r($model->getChekData($model->competition_id)); 
                ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Подать' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->