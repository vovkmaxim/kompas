<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
            'htmlOptions' => array(
                'class' => 'well',
               'enctype' => 'multipart/form-data',
           ),
)); ?>

	<p class="note">Обязательные <span class="required">*</span> поля.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'username'); ?>
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
		<?php echo $form->labelEx($model,'data_birth'); ?>
		<?php echo $form->textField($model,'data_birth'); ?>
		<?php echo $form->error($model,'data_birth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'phone'); ?>
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
		<?php echo $form->labelEx($model,'club'); ?>
		<?php echo $form->textField($model,'club',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'club'); ?>
	</div>

	<div class="row">
            
           
		<?php echo $form->labelEx($model,'status'); ?>
                <?php 
                    echo $form->dropDownList($model,'status',
                    array('0' => 'Не актевирован', 
                          '1' => 'Активирован', ),
                    array('class'=>"btn btn-info", 'data-toggle'=>"dropdown"),
                    array('0' => 'Не актевирован', ));            
                ?>
		<?php // echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'member'); ?>
		<?php 
                    echo $form->dropDownList($model,'member',
                    array('0' => 'Не член клуба', 
                          '1' => 'Член клуба', ),
                    array('class'=>"btn btn-info", 'data-toggle'=>"dropdown"),
                    array('0' => 'Не член клуба', ));            
                ?>
		<?php echo $form->error($model,'member'); ?>
	</div>

	<div class="row">
		<?php echo "User Role"; ?>
		<?php
                    $selekl_list = new Role();
                    echo $form->dropDownList($selekl_list,'role',
                    Role::getAllRolle(),
                    array('0000000004' => 'guest', 'multiple' => 'multiple'));            
                ?>
		<?php echo $form->error($model,'member'); ?>
	</div>
        	
         <div class="field">
            <?php if($model->avatar): ?>
                <p><?php echo $model->getAvatar(); ?></p>
            <?php endif; ?>
            <?php // echo $form->labelEx($model,'path'); ?>
                <p>Разрешенные форматы: jpg, jpeg, gif, png</p>
                <input id="ytPhoto_path" type="hidden" name="avatar" value="">
                <input class="btn btn-info" id="Photo_path" type="file" name="avatar" style="width: 275px">
            <?php  echo $form->error($model,'avatar'); ?>
        </div> 

	<div class="row buttons">
		<input class="btn btn-primary" type="submit" value="<?php if($model->isNewRecord){echo 'СОЗДАТЬ';} else { echo 'СОХРАНИТЬ';} ?>" />
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->