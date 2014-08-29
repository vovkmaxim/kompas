<?php
/* @var $this CompetitionController */
/* @var $model Competition */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'competition-form',
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

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>

            <?php 
            
            if(!empty($model->type)){
                ?>
                <select name="type" size="1">
                        <?php
                    if($model->type == 1){
                        ?>
                        <option selected="selected" value="1">Тренеровка</option>
                        <option value="2">Соревнования</option>
                        <?php

                    } elseif($model->type == 2){
                        ?>
                        <option  value="1">Тренеровка</option>
                        <option selected="selected" value="2">Соревнования</option>
                        <?php
                    } else {
                        ?>
                        <option  selected="selected" value="0">  </option>
                        <option  value="1">Тренеровка</option>
                        <option  value="2">Соревнования</option>
                        <?php
                    }
                    ?>
                 </select>       
                    <?php

                } else {
                    ?>
                <select name="type" size="1">
                    <option  selected="selected" value="0">   </option>
                    <option  value="1">Тренеровка</option>
                    <option  value="2">Соревнования</option>
                </select>
                <?php
            }
            
            ?>              
                    
                
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<div class="row">
            <?php if($model->logo_desc): ?>
                <p><?php echo CHtml::encode($model->logo_desc); ?></p>
                <?php echo $model->getLogoImage(); ?>
                
            <?php endif; ?>
            <?php echo $form->labelEx($model,'logo_desc'); ?>
            <?php echo $form->fileField($model,'logo_desc'); ?>
            <?php echo $form->error($model,'logo_desc'); ?>
	</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

        <div class="row">
            Задать нужно в формате: гггг-мм-дд (2014-07-12)
            <?php echo $form->labelEx($model,'start_data'); ?>
            <?php echo $model->getYearInput("year_start_data", "start_data"); ?>
            <?php echo $model->getDataList("monts_start_data", 'start_data', 12, "Monts");  ?>
            <?php echo $model->getDataList("day_start_data", 'start_data', 31, "Day");  ?>
            <?php echo $form->error($model,'start_data'); ?>
            <?php echo $form->labelEx($model,'start_time'); ?>
            <?php echo $model->getHourList("hour_start_time",'start_time');  ?>
            <?php echo $form->error($model,'start_time'); ?>
	</div>

	<div class="row">
            Задать нужно в формате: гггг-мм-дд (2014-07-12)
            <?php echo $form->labelEx($model,'end_data'); ?>
            <?php echo $model->getYearInput("year_end_data", "end_data"); ?>
            <?php echo $model->getDataList("monts_end_data", 'end_data', 12, "Monts");  ?>
            <?php echo $model->getDataList("day_end_data", 'end_data', 31, "Day");  ?>
            <?php echo $form->error($model,'end_data'); ?>
            <?php echo $form->labelEx($model,'end_time'); ?>
	    <?php echo $model->getHourList("hour_end_time", 'end_time');  ?>
            <?php echo $form->error($model,'end_time'); ?>
	</div>

	<div class="row">
            Задать нужно в формате: гггг-мм-дд (2014-07-12)
            <?php echo $form->labelEx($model,'close_registration_data'); ?>
            <?php echo $model->getYearInput("year_close_registration_data", "close_registration_data"); ?>
            <?php echo $model->getDataList("monts_close_registration_data", 'close_registration_data', 12, "Monts");  ?>
            <?php echo $model->getDataList("day_close_registration_data", 'close_registration_data', 31, "Day");  ?>
            <?php echo $form->error($model,'close_registration_data'); ?>
            <?php echo $form->labelEx($model,'close_registration_time'); ?>
            <?php echo $model->getHourList("hour_close_registration_time", 'close_registration_time');  ?>            
            <?php echo $form->error($model,'close_registration_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enable_registration_flag'); ?>
		<?php             
                if(!empty($model->enable_registration_flag)){
                    ?>
                    <select name="enable_registration_flag" size="1">
                            <?php
                        if($model->enable_registration_flag == 1){
                            ?>
                            <option selected="selected" value="1"> Да </option>
                            <option value="2"> Нет </option>
                            <?php

                        } elseif($model->enable_registration_flag == 2){
                            ?>
                            <option  value="1"> Да </option>
                            <option selected="selected" value="2"> Нет </option>
                            <?php
                        } else {
                            ?>
                            <option  selected="selected" value="0">   </option>
                            <option  value="1"> Да </option>
                            <option  value="2"> Нет </option>
                            <?php
                        }
                        ?>
                     </select>       
                        <?php

                    } else {
                        ?>
                    <select name="enable_registration_flag" size="1">
                        <option  selected="selected" value="0">   </option>
                        <option  value="1"> Да </option>
                        <option  value="2"> Нет </option>
                    </select>
                    <?php
                }
                ?>
		<?php echo $form->error($model,'enable_registration_flag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'archive'); ?>
		<?php             
                if(!empty($model->archive)){
                    ?>
                    <select name="archive" size="1">
                            <?php
                        if($model->archive == 1){
                            ?>
                            <option selected="selected" value="1"> Да </option>
                            <option value="2"> Нет </option>
                            <?php

                        } elseif($model->archive == 2){
                            ?>
                            <option  value="1"> Да </option>
                            <option selected="selected" value="2"> Нет </option>
                            <?php
                        } else {
                            ?>
                            <option  selected="selected" value="0">   </option>
                            <option  value="1"> Да </option>
                            <option  value="2"> Нет </option>
                            <?php
                        }
                        ?>
                     </select>       
                        <?php

                    } else {
                        ?>
                    <select name="archive" size="1">
                        <option  selected="selected" value="0">   </option>
                        <option  value="1"> Да </option>
                        <option  value="2"> Нет </option>
                    </select>
                    <?php
                }
                ?>
		<?php echo $form->error($model,'archive'); ?>
	</div>
	<div class="row">
            <p>Группы учасники:</p>
            <p>
                <?php echo $model->getGroupCompetitionFormCheckbox(); ?>
            </p>

        </div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'СОЗДАТЬ' : 'СОХРАНИТЬ'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->