<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->title,
);

?>

<h1><?php echo $model->title; ?></h1>



        <?php echo CHtml::encode($model->description); ?>
	<br />
       
        <?php echo CHtml::encode($model->author); ?>
	<br />
        
        <?php echo CHtml::encode($model->create_date); ?>
	<br />
        
        <?php echo CHtml::encode($model->update_date); ?>
	<br />
        
        <?php echo CHtml::encode($model->text); ?>
	<br />
        
        <?php echo $model->getEventsImage(); ?>
	<br />


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
                    <input id="Comments_events_id" type="hidden" value="<?php echo $model->id; ?>" name="Comments[events_id]" maxlength="10" size="10">
                </div>
                <div class="row">
                    <input id="Comments_competition_id" type="hidden" value="0" name="Comments[competition_id]" maxlength="10" size="10">
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
