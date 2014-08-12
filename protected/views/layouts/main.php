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
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sliders.css" />
        
        <!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation.min.js" type="text/javascript"></script>-->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<!--        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/zepto.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery.horizontalNav.js" type="text/javascript"></script>-->
        
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/lib/jquery-1.10.1.min.js"></script>
        
        <title>Клуб спортивного орієнтування «Компас» м.Харків</title>
	<!--<title><?php // echo CHtml::encode($this->pageTitle); ?></title>-->
</head>

<body>

<div class="container" id="page">
<div id="header">
	<div class="header-top">
	<div class="row">
		<div class="small-12 columns">
			<div class="logo small-4 large-3 large-uncentered columns">
				<a href="index.php" class="">
					<img id="logo1" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_1.png" alt="«Компас» м.Харків" title="«Компас» м.Харків"/>
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="«Компас» м.Харків" title="«Компас» м.Харків"/>
				</a>
			</div>
			
			<div class="top-login small-4 large-3 columns">
				<div class="top-user">
					<a href="#" data-dropdown="profile" data-options="is_hover:true" class="top-user-link" alt="Вход" title="Вход">Войти</a>
				</div>
				<div class="top-contact">
					<a href="#" data-dropdown="calendar" data-options="is_hover:true" class="calendar"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ico-calendar.png" alt="Календарь" title="Календарь"/></a>
					<div id="calendar" class="f-dropdown" data-dropdown-content>
					</div>
					<div class="top-tell"><span></span>+3(067) 857 75 86</div>
					<div class="top-email">example@gmail.com</div>
				</div>
			</div>
			<div class="top-banner small-12 large-6 small-centered large-uncentered columns">
				<img data-src="holder.js/100%x72/social" alt="top banner">
			</div>
		</div>
	</div>
	</div>
</div>
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Главная', 'url'=>array('/site/index')),
				array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Новости', 'url'=>array('/events/news')),
                                array('label'=>'Соревнования', 'url'=>array('/competition/index')),
                                array('label'=>'Тренировки', 'url'=>array('/competition/training')),
                                array('label'=>'Статьи', 'url'=>array('/events/article')),
                                array('label'=>'Члены клуба', 'url'=>array('/user/index')),
                                array('label'=>'Ссылки', 'url'=>array('/link/index')),
                                array('label'=>'Регистрация', 'url'=>array('/user/registration')),
                                array('label'=>'Фото-галерея', 'url'=>array('/photo/galery')),
				array('label'=>'Онас', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Контакты', 'url'=>array('/site/contact')),
			),
		)); ?>
	</div><!-- mainmenu -->
        
        <?php
        $sliders = Sliders::model()->findAll();
        $request = Yii::app()->request->requestUri;
        if($sliders!=NULL){
           if($request == '/' || $request == '/index.php?r=site/index'){ ?>
<div id="slider-wrap">
	<div id="slider">
        <?php   foreach($sliders as $slider){   ?>
                    <div class="slide"><img src="sliders/<?php echo $slider->path; ?>" width="640" height="360"></div>
        <?php   }   ?>
	</div>
</div>

        <?php 
            }
        }       
        ?>
           <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sliders.js"></script>
         <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
        <script type="text/javascript">
		$(document).ready(function() {
			
			$('.fancybox').fancybox();

		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
        
        <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="calendar">
            <?php 
                /* КАЛЕНДАРЬ!!!!! */           
                $user = User::model()->findAll();
//                print_r($user[0]->name);
                $mass_data = explode('-', date('m-Y'));
                echo '<h2>' . get_mont($mass_data[0]) . ' ' . $mass_data[1] . '</h2>';
                echo draw_calendar($mass_data[0],$mass_data[1]);
            ?>
        </div>
	<div class="banners">
            <?php
            
            echo Banners::getAllBanners();
            
            ?>
            
        </div>

	<div class="quote">
            <?php
            
            $Quote = new Quote();
            $quote = $Quote->getRandQuote();
            echo '<p>'.$quote->quote.'</p>';
            echo '<p>'.$quote->author_quote.'</p>';
            
            ?>
        </div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
