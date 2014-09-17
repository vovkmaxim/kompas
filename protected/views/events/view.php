<?php
/* @var $this EventsController */
/* @var $model Events */
$this->breadcrumbs = array(
    'Новость(Статья)' => array('index'),
    $model->title,
);
?>



<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
        <script type="text/javascript">
		$(document).ready(function() {
                        $(".fancybox").fancybox({
                                openEffect	: 'none',
                                closeEffect	: 'none'
                        });
                });
	</script>
<div class="large-12 columns">
    <div id="news-item" class="large-12 small-12 columns">
        <h3><?php echo $model->title; ?></h3>
        <!--<span class="date-time">Дата создания: <?php echo CHtml::encode($model->create_date); ?></span></br>-->
        <div class="img-content">
            <div class="small-3 large-4 columns">
                        <?php echo $model->getEventsImage(); ?>
            </div>
            <!--<img src="/logo_events/<?php echo $model->logo_path; ?>" alt="<?php echo $model->logo_title; ?>"/>-->
<!--            <div id="footer">
                <span class="date-time"> КРАТКОЕ ОПИСАНИЕ:</span></br>
                <span class="date-time"><?php echo CHtml::encode($model->description); ?></span></br>
            </div>-->
        </div>
        </br>
        <p><?php echo CHtml::encode($model->text); ?></p>
        <div class="row">
            <div class="large-6 small-12 columns">
<!--                <div class="tags">Теги: ориентирование, компас</div>
                <div><img src="/images/ico-socials.png" alt="socials"></div>-->
            </div>
            <div class="large-6 small-12 columns" style="text-align: center;">
            </div>
        </div>
    </div>
</div>
<?php 
if($file->itemCount){
   echo  $model->getFileForThisEvents();
}
?>
    <div>
        <?php 
        if($comments->itemCount){
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$comments,
        //            'pager'=>array(
        //                'header'         => '',
        //                'firstPageLabel' => '&lt;&lt;',
        //                'prevPageLabel'  => '<img src="images/pagination/left.png">',
        //                'nextPageLabel'  => '<img src="images/pagination/right.png">',
        //                'lastPageLabel'  => '&gt;&gt;',
        //         ),
//                'template'=>'{pager}{items}{pager}',
                    'itemView'=>'_viewcomment',
                 ));
            }
        ?>
    </div>
<div id="comments-form" class="form">
    <?php
    if (!Yii::app()->user->isGuest) {
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
                    <input class="button8" type="submit" value="Отправить" />
                </div>
            </form>
        </div>
        <?php
    } else {
        echo '<p>Для того что бы оставвить отзыв Вы должны авторезироватся</p>';
    }
    ?>
</div>