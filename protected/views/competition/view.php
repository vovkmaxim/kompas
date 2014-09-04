<?php
/* @var $this CompetitionController */
/* @var $model Competition */

$this->breadcrumbs=array(
	'Competitions'=>array('index'),
	$model->title,
);

?>


<div class="large-12 columns">
	<div id="news-item" class="large-12 small-12 columns">
		
		<h3>«<?php echo $model->title . ' (' . $model->start_data . ' - ' . $model->end_data . ')'     ; ?>»</h3>
		<span class="date-time"><p>Дата начала: <?php echo $model->start_data; ?>  - время начала: <?php echo $model->start_time; ?></p></span>
		<span class="date-time"><p>Дата окончания: <?php echo $model->end_data; ?>  - время окончания: <?php echo $model->end_time; ?></p></span>
		<div class="img-content">
                    <img width="563" height="291" alt="logo" src="/logo_competition/<?php echo $model->logo_desc; ?>">
                    <!--<img data-src="holder.js/100%x291/grey" alt="image">-->
		</div>
		<p><?php echo $model->text; ?></p>
		<div id="mymap" class="large-12 small-12 columns"></div>
		<div class="row">
			<div class="large-6 small-12 columns">
				<div class="tags">Теги: ориентирование, компас</div>
				<div><img src="/images/ico-socials.png" alt="socials"></div>
			</div>
			<!--<div class="large-6 small-12 columns" style="text-align: center;">-->
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

?>			<!--</div>-->
 <span class="date-time"><p>Дата создания: </h4><?php echo $model->create_date; ?></p></span>                       
    <?php
        if($model->enable_registration_flag == 1){
            echo '<span class="date-time">Окончание регистрации: ' . $model->close_registration_data . ' время' . $model->close_registration_data . '</span>';
            if(!Yii::app()->user->isGuest){
                echo '<p>'.CHtml::link('Подать заявку', array('competitionRequest/application', 'id'=>$model->id)).'</p> ';  
            } else {
                echo '<h6> Для подачи заявки нужно войти в систему! </h6>';  
            }

        }
    ?>   
		</div>
	</div>
</div>
<div class="people large-12 small-12 columns">
    <div class="people-about">Уже заявилось:</div>
    <div>        
        <?php        
        if($request != NULL){
                $this->widget('zii.widgets.grid.CGridView', array(
                       'id'=>'competition-request-grid',
                       'dataProvider'=>$request,
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
                               'sity',
                               'coutry',
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
            <form id="comments-form" method="post" action="/index.php/comments/create">
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

</div>