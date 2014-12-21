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
                'class' => 'well',
               'enctype' => 'multipart/form-data',
           ),
)); ?>

	<h4 class="">Обязательные <span class="required">*</span> поля.</h4>
<!--	<p class="label label-info"><h4>Обязательные <span class="required">*</span> поля.</h4></p>-->

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
             <!--="Вспомогающий текст…"-->
		<?php echo $form->textField($model,'title',array('class'=>"span3",'placeholder'=>"Заголовок…",'size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('class'=>"span3",'placeholder'=>"Описание…",'size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	
         <div class="field">
            <?php if($model->path): ?>
                <p><?php echo CHtml::encode($model->path); ?></p>
            <?php endif; ?>
            <?php // echo $form->labelEx($model,'path'); ?>
                <p>Разрешенные форматы: jpg, jpeg, gif, png</p>
                <input id="ytPhoto_path" type="hidden" name="Photo[path]" value="">
                <input class="btn btn-info" id="Photo_path" type="file" name="Photo[path]" style="width: 275px">
            <?php  echo $form->error($model,'path'); ?>
        </div>    

	<div class="row">
            <div class="btn-group-vertical">
		<?php echo $form->labelEx($model,'group_photo_id'); ?>
		<?php 
                    echo CHtml::dropDownList('group_photo_id', $model, 
                              $model->getAllGroupPhotoList(),
                              array('class'=>"btn btn-info", 'data-toggle'=>"dropdown"));
                ?>
		<?php echo $form->error($model,'group_photo_id'); ?>
            </div>
	</div>
		<?php echo $form->hiddenField($model,'user_id',array('size'=>'50','value'=> Yii::app()->user->id )); ?>
	<div class="row buttons">
            <input class="btn btn-primary" type="submit" value="<?php if($model->isNewRecord){echo 'СОЗДАТЬ';} else { echo 'СОХРАНИТЬ';} ?>" />
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->