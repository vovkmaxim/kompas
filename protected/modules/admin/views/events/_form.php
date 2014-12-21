<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(    
	'id'=>'events-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array(
            'class' => 'well',
            'enctype' => 'multipart/form-data',
        ),
)); ?>
	<p class="note">Обязательные <span class="required">*</span> поля.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
                <?php 
                    echo CHtml::dropDownList('type', $model, 
                              array(
                                  1 => "Новость",
                                  2 => "Статья",
                              ),
                              array('2' => 'Статья'));
                ?>
		<?php // echo $form->textField($model,'type',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php 
                    echo CHtml::dropDownList('status', $model, 
                              array(
                                  1 => "Опубликованная",
                                  2 => "Не опубликованная",
                              ),
                              array('2' => 'Статья'));
                ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('class'=>"span3",'placeholder'=>"Заголовок…",'size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
                <?php                 
                $this->widget('ImperaviRedactorWidget', array(
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
                     ));                
                ?>
		<?php // echo $form->textField($model,'description',array('class'=>"span3",'placeholder'=>"Описания…",'size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('class'=>"span3",'placeholder'=>"Автор…",'size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
            	<?php                 
                    $this->widget('application.extensions.ckeditor.ECKEditor', array(
                            'model' => $model,
                            'attribute' => 'text',
                            'name' => 'text',
                         ));                
                ?>  
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logo_title'); ?>
		<?php echo $form->textField($model,'logo_title',array('class'=>"span3",'placeholder'=>"Заголовок логотипа…",'size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'logo_title'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="field">
            
            <?php if($model->logo_path): ?>
                <p><?php echo CHtml::encode($model->logo_path); ?></p>
                <?php echo $model->getEventsImage(); ?>
                
            <?php endif; ?>
            <?php echo $form->labelEx($model,'logo_path'); ?>
                 <p>Разрешенные форматы: jpg, jpeg, gif, png, bmp</p>
            <span class="btn button7"><p>ЗАГРУЗИТЬ КАРТИНКУ</p><?php echo $form->fileField($model,'logo_path'); ?></span>
            <?php // echo $form->fileField($model,'logo_path'); ?>
            <?php echo $form->error($model,'logo_path'); ?>  
            
	</div>
        
        
	<div class="row buttons">
            <input class="knopka" type="submit" value="<?php if($model->isNewRecord){echo 'СОЗДАТЬ';} else { echo 'СОХРАНИТЬ';} ?>" />
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->