<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->title,
);

?>
<div class="large-12 columns">
    <div id="news-item" class="large-12 small-12 columns">
    <h3>«<?php echo $model->title;?>»</h3>
    <span class="date-time"><p>Дата создания: <?php  echo CHtml::encode($model->create_date);?> </p></span>
    <span class="date-time"><p>Дата обновления: <?php echo CHtml::encode($model->update_date); ?></p></span>
    <span class="date-time"><p>Краткое описание: </br><?php echo CHtml::encode($model->description); ?></p></span>
		<div class="img-content">
                    <img width="563" height="291" alt="logo" src="logo_events/<?php echo $model->logo_path; ?>"  width="147" height="115" alt="<?php echo $model->logo_title; ?>">
                    <!--<img width="563" height="291" alt="logo" src="logo_competition/<?php // echo $model->logo_desc; ?>">-->
                    <!--<img data-src="holder.js/100%x291/grey" alt="image">-->
		</div>
		<p><?php echo CHtml::encode($model->text); ?></p>
		
	<br />
    <span class="date-time"><p>Автор: <?php echo CHtml::encode($model->author); ?></p></span>
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
    </div>
</div>
<div class="comments">
    <?php
    $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$comments,
	'itemView'=>'_viewcomment',
));
?>
    
</div>
<div id="comments-form" class="form">
 <?php
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
                    <input class="large success button radius" type="submit" value="Отправить" name="yt0">
                </div>
            </form>
        </div>

<?php
} else {
    echo '<p>Для того что бы оставить отзыв Вы должны авторезироватся</p>';
}

?>
