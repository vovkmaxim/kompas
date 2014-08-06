<?php
/* @var $this CompetitionController */
/* @var $model Competition */

$this->breadcrumbs=array(
	'Competitions'=>array('index'),
	$model->title,
);

?>
<div class="article">
<h1><?php echo $model->title . ' (' . $model->start_data . ' - ' . $model->end_data . ')'     ; ?></h1>
<p>Дата начала: <?php echo $model->start_data; ?>  - время начала: <?php echo $model->start_time; ?></p>
<p>Дата окончания: <?php echo $model->end_data; ?>  - время окончания: <?php echo $model->end_time; ?></p>
<?php echo $model->getLogoImage(); ?>
<p><?php echo $model->text; ?></p>

<?php

if($file != NULL){
    
    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'file-grid',
	'dataProvider'=>$file,
	'columns'=>array(
		'id',
		'name',
                array(
                    'type' => 'raw',
                    'value' => '$data->viewsFile()',
                    'filter' => true,
                    'htmlOptions' => array(
                        "width" => 128,
                    ),
                ),
                array(
                    'type' => 'raw',
                    'value' => '$data->getType()',
                    'filter' => true,
                    'htmlOptions' => array(
                        "width" => 128,
                    ),
                ),
	),
));
    
    
}

?>
<h4>Дата создания: </h4><?php echo $model->create_date; ?></br>
<?php
if($model->enable_registration_flag == 1){
    echo 'Окончание регистрации: ' . $model->close_registration_data . ' время' . $model->close_registration_data;
    if(!Yii::app()->user->isGuest){
        echo '<p>'.CHtml::link('Подать заявку', array('competitionRequest/application', 'id'=>$model->id)).'"</p> ';  
    } else {
        echo '<h6> Для подачи заявки нужно войти в систему! </h6>';  
    }
      
}

if($request != NULL){
 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'competition-request-grid',
	'dataProvider'=>$request,
//	'filter'=>$request,
	'columns'=>array(
		'id',
		array(
                    'name' => 'group_id',
                    'type' => 'raw',
                    'value' => '$data->getGroupName()',
                    'filter' => false,
                ),
		'name',
		'lastname',
		'year',		
		'chip',
		'dyusch',
		'sity',
		'coutry',
		'team',
		'coach',
		'fst',
		'participation_data',
		array(
                    'name' => 'Состояние',
                    'type' => 'raw',
                    'value' => '$data->getNameStatus()',
                    'filter' => false,
                ),
                array(
                    'name' => 'Представитель',
                    'type' => 'raw',
                    'value' => '$data->getNameUser()',
                    'filter' => false,
                ),
		
	),
));
}


$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$comments,
	'itemView'=>'_viewcomment',
));

if(!Yii::app()->user->isGuest){
?>
        <div class="comment">
            <p>Ваш отзыв:</p>
            <form id="comments-form" method="post" action="/index.php?r=comments/create">
                <div class="row">
                    <input id="Comments_events_id" type="hidden" value="0" name="Comments[events_id]" maxlength="10" size="10">
                </div>
                <div class="row">
                    <input id="Comments_competition_id" type="hidden" value="<?php echo $model->id; ?>" name="Comments[competition_id]" maxlength="10" size="10">
                </div>
                <div class="row">
                    <input id="Comments_user_id" type="hidden" value="<?php echo Yii::app()->user->id; ?>" name="Comments[user_id]" maxlength="10" size="10">
                </div>
                <div class="row">
                    <input id="Comments_create_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" name="Comments[create_date]">
                </div>
                <div class="row">
                    <label for="Comments_title">Тема:</label>
                    <input id="Comments_title" type="text" name="Comments[title]" maxlength="255" size="60">
                </div>
                <div class="row">
                    <label for="Comments_text">Текст:</label>
                    <textarea id="Comments_text" name="Comments[text]" cols="50" rows="6"></textarea>
                </div>
                <div class="row buttons">
                    <input type="submit" value="Отправить" name="yt0">
                </div>
            </form>
        </div>

<?php
} else {
    echo '<p>Для того что бы оставвить отзыв Вы должны авторезироватся</p>';
}

?>

</div>
