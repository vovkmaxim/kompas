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

<h4>Дата создания: </h4><?php echo $model->create_date; ?></br>


<?php
if($model->enable_registration_flag == 1){
    echo 'Окончание регистрации: ' . $model->close_registration_data . ' время' . $model->close_registration_data;
    
    echo '<p>'.CHtml::link('Подать заявку', array('competitionRequest/application', 'id'=>$model->id)).'"</p> ';    
}
//
//if($request != NULL){
//    
//    foreach ($request as $reqs){
//            $this->widget('zii.widgets.grid.CGridView', array(
//                
//            'id'=>'competition-request-grid',
//            'dataProvider'=>$reqs,
//            'filter'=>$reqs,
//            'columns'=>array(
//                    'id',
////                    'competition_id',
////                    'group_id',
////                    'name',
////                    'lastname',
////                    'year',
////                    'chip',
////                    'dyusch',
////                    'sity',
////                    'coutry',
////                    'team',
////                    'coach',
////                    'fst',
////                    'participation_data',
////                    'status',
////                    'user_id',
//                
//            ),
//    ));
//    }
//    
//    
//}
//

?>
</div>
