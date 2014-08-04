<?php
/* Функция генерации календаря */
function draw_calendar($month,$year){
  /* Начало таблицы */
  $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
  /* Заглавия в таблице */
  $headings = array('Понедельник','Вторник','Среда','Четверг','Пятница','Субота','Воскресенье');
  $calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
  /* необходимые переменные дней и недель... */
  $running_day = date('w',mktime(0,0,0,$month,1,$year));
  $running_day = $running_day - 1;
  $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
  $days_in_this_week = 1;
  $day_counter = 0;
  $dates_array = array();
  /* первая строка календаря */
  $calendar.= '<tr class="calendar-row">';
  /* вывод пустых ячеек в сетке календаря */
  for($x = 0; $x < $running_day; $x++):
    $calendar.= '<td class="calendar-day-np"> </td>';
    $days_in_this_week++;
  endfor;
  // ***************************************************************************
  // ***************************************************************************
  // ***************************************************************************
  
  $user = User::model()->findAll();
  $user_dey_list = array();
  foreach ($user as $users){
      $mas_data = explode('-', $users->data_birth);
      $user_dey_list[] = $mas_data[1] . '-' . $mas_data[2];
  }
  
  // ***************************************************************************
  // ***************************************************************************
  // ***************************************************************************
  /* дошли до чисел, будем их писать в первую строку */
  for($list_day = 1; $list_day <= $days_in_month; $list_day++):
    $calendar.= '<td class="calendar-day">';
      /* Пишем номер в ячейку */
      $data = $month . '-' . $list_day;
      $flag = false;
      foreach ($user_dey_list as $k => $v){
        if($data == $v){
            $flag = true;
        }
      }
         
      if($flag){
          $calendar.= '<div class=""> ***'. $list_day.'***</div>';
      } else {
          $calendar.= '<div class="day-number">'. $list_day.'</div>';
      }
             
      /** ЗДЕСЬ МОЖНО СДЕЛАТЬ MySQL ЗАПРОС К БАЗЕ ДАННЫХ! ЕСЛИ НАЙДЕНО СОВПАДЕНИЕ ДАТЫ СОБЫТИЯ С ТЕКУЩЕЙ - ВЫВОДИМ! **/
      $calendar.= str_repeat('<p> </p>',2);
      
    $calendar.= '</td>';
    if($running_day == 6):
      $calendar.= '</tr>';
      if(($day_counter+1) != $days_in_month):
        $calendar.= '<tr class="calendar-row">';
      endif;
      $running_day = -1;
      $days_in_this_week = 0;
    endif;
    $days_in_this_week++; $running_day++; $day_counter++;
  endfor;
  /* Выводим пустые ячейки в конце последней недели */
  if($days_in_this_week < 8):
    for($x = 1; $x <= (8 - $days_in_this_week); $x++):
      $calendar.= '<td class="calendar-day-np"> </td>';
    endfor;
  endif;
  /* Закрываем последнюю строку */
  $calendar.= '</tr>';
  /* Закрываем таблицу */
  $calendar.= '</table>';
  
  /* Все сделано, возвращаем результат */
  return $calendar;
}

function get_mont($mont){
    $monts_array = array(
        "01" => 'Январь',
        "02" => 'Февраль',
        "03" => 'Март',
        "04" => 'Апрель',
        "05" => 'Май',
        "06" => 'Июнь',
        "07" => 'Июль',
        "08" => 'Август',
        "09" => 'Сентябрь',
        "10" => 'Октябрь',
        "11" => 'Ноябрь',
        "12" => 'Декабрь',
    );
    foreach ($monts_array as $k => $v){
        if($mont == $k){
            return $v;
        }
    }
}


?>
<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicons/apple-touch-icon-144x144-precomposed.png"/>
	<!-- For iPhone with high-resolution Retina display: -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicons/apple-touch-icon-114x114-precomposed.png"/>
	<!-- For first- and second-generation iPad: -->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicons/apple-touch-icon-72x72-precomposed.png"/>
	<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
	<link rel="apple-touch-icon-precomposed" href="img/favicons/apple-touch-icon-precomposed.png"/>
	<link rel="icon" href="img/favicons/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation.css"/>
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <title>Клуб спортивного орієнтування «Компас» м.Харків</title>
	<!--<title><?php // echo CHtml::encode($this->pageTitle); ?></title>-->
</head>

<body>

<div class="container" id="page">

<!--	<div id="header">
		<div id="logo"><?php // echo CHtml::encode(Yii::app()->name); ?></div>
	</div> header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Banners', 'url'=>array('banners/index')),
                                array('label'=>'Ссылки', 'url'=>array('link/index')),
                                array('label'=>'Quote', 'url'=>array('quote/index')),
                                array('label'=>'Group', 'url'=>array('group/index')),
                                array('label'=>'Users', 'url'=>array('user/index')),
                                array('label'=>'Role', 'url'=>array('role/index')),
                                array('label'=>'Ranks', 'url'=>array('rank/index')),
                                array('label'=>'Group Photo', 'url'=>array('groupPhoto/index')),
                                array('label'=>'Events', 'url'=>array('events/index')),
                                array('label'=>'Competition', 'url'=>array('competition/index')),
                                array('label'=>'File', 'url'=>array('file/index')),
                                array('label'=>'Photo', 'url'=>array('photo/index')),
                                array('label'=>'Заявки на соревнования(тренировки)', 'url'=>array('competitionRequest/index')),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
                <br/><br/><br/><br/>
             
	<?php echo $content; ?>

	<div class="clear">
            <?php 
                /* КАЛЕНДАРЬ!!!!! */           
                $user = User::model()->findAll();
                print_r($user[0]->name);
                $mass_data = explode('-', date('m-Y'));
                echo '<h2>' . get_mont($mass_data[0]) . ' ' . $mass_data[1] . '</h2>';
                echo draw_calendar($mass_data[0],$mass_data[1]);
            ?>
        </div>

	<div id="footer">
            	Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		Author Maxim Vovk
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
