<?php
/* @var $this LinkController */
/* @var $model Link */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'link-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array(
                'class' => 'well',
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

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php  $this->widget('ImperaviRedactorWidget', array(
                        'model' => $model,
                        'attribute' => 'description',
                        'name' => 'my_input_name',
                        'options' => array(
                                'lang' => 'ru',
                                'toolbar' => true,
                                'iframe' => true,
                                'css' => 'wym.css',
                                'placeholder'=>"Описания…",
                        ),
                     ));  ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'path'); ?>
		<?php echo $form->textArea($model,'path',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'path'); ?>
	</div>
        	
         <div class="field">
            <?php if($model->logo): 
                 echo $model->getImage();
                endif; ?>
            <?php // echo $form->labelEx($model,'path'); ?>
                <p>Разрешенные форматы: jpg, jpeg, gif, png</p>
                <input id="ytPhoto_path" type="hidden" name="Link[logo]" value="<?php echo $model->logo; ?>">
                <input class="btn btn-info" id="Photo_path" type="file" name="Link[logo]" style="width: 275px">
            <?php  echo $form->error($model,'logo'); ?>
        </div>  
	<div class="row buttons">
            <input class="knopka" type="submit" value="<?php if($model->isNewRecord){echo 'СОЗДАТЬ';} else { echo 'СОХРАНИТЬ';} ?>" />
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->