<?php
/* Функция генерации календаря */
function draw_new_calendar($month,$year,$this_){
  /* Начало таблицы */
    $mass_data = explode('-', date('m-Y'));
  $calendar = '<div class="cal">
						  <table class="cal-table"><caption class="cal-caption">
							  ' . get_mont($mass_data[0]) . ' ' . $mass_data[1] . '
							</caption>
							<tbody class="cal-body">';
  /* Заглавия в таблице */
  $headings = array('Пн','Вт','Ср','Чт','Пт','Сб','Вс');
  $calendar.= '<tr><td class="">'.implode('</td><td class="">',$headings).'</td></tr>';
  /* необходимые переменные дней и недель... */
  $running_day = date('w',mktime(0,0,0,$month,1,$year));
  $running_day = $running_day - 1;
  $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
  $days_in_this_week = 1;
  $day_counter = 0;
  $dates_array = array();
  /* первая строка календаря 
   * 
   * 
   * <tr><td class="cal-off"><a href="#">30</a></td>
   *   
   *  */
  $calendar.= '<tr>';
  /* вывод пустых ячеек в сетке календаря */
  for($x = 0; $x < $running_day; $x++):
    $calendar.= '<td class="cal-off"><a href="#"> - </a></td>';
    $days_in_this_week++;
  endfor;
  
  $user = User::model()->findAll('status=:status AND member=:member',array(':status' => 1, ':member' => 1));
  $user_dey_list = array();
  foreach ($user as $users){
      $mas_data = explode('-', $users->data_birth);
      $user_dey_list[$users->id]['data'] = $mas_data[1] . '-' . $mas_data[2];
      $user_dey_list[$users->id]['id'] = $users->id;
  }
  
  $competition = Competition::model()->findAll();
  $competition_data = array();
  foreach ($competition as $competitions){
      $start_data = explode('-', $competitions->start_data);
      $end_data = explode('-', $competitions->end_data);
      $competition_data[$competitions->id]['start_data'] = $start_data[1] . '-' . $start_data[2];
      $competition_data[$competitions->id]['end_data'] = $end_data[1] . '-' . $end_data[2];
      $competition_data[$competitions->id]['type'] = $competitions->type;
      $competition_data[$competitions->id]['id'] = $competitions->id;
  }
  
  
//  print_r('<pre>');
////  print_r($competition_data);
//  print_r($this_);
//  print_r('<pre>');
//  die();
  /* дошли до чисел, будем их писать в первую строку */
  for($list_day = 1; $list_day <= $days_in_month; $list_day++):
      if($list_day < 10){
            $data = $month . '-0' . $list_day;
            $seu_dey = '0'.$list_day;
      } else {
            $data = $month . '-' . $list_day;
            $seu_dey = $list_day;
      }
      
      $todey = date('d');
      $flag = false;
      $next_flag = false;
      foreach ($user_dey_list as $user_dey_lists){
        if($data == $user_dey_lists['data']){
            $flag = true;
            $next_flag = true;
            if($todey == $seu_dey){
                $calendar.= '<td class="cal-check-U cal-selected" ><a href="'.$this_->createUrl('user/view',array('id'=>$user_dey_lists['id'])).'"> '. $list_day.' ';
            } else {
                $calendar.= '<td class="cal-check-U" ><a href="'.$this_->createUrl('user/view',array('id'=>$user_dey_lists['id'])).'"> '. $list_day.' ';
            }          
        
        }
      }
      $count_competition = count($competition_data);
      if($flag){
        } else {
            foreach ($competition_data as $competition_dat){
                $str = $competition_dat['start_data'];
                if($data == $competition_dat['end_data'] && $competition_dat['type'] == 1 || $data == $competition_dat['start_data'] && $competition_dat['type'] == 1 || $data > $competition_dat['start_data'] && $data < $competition_dat['end_data'] && $competition_dat['type'] == 1){ 
                // Тренировка
                    $next_flag = true;
                    if($todey == $seu_dey){
                         $calendar.= '<td class="cal-check-T cal-selected" ><a href="'.$this_->createUrl('competition/view',array('id'=>$competition_dat['id'])).'"> '. $list_day.' ';   
                    } else {
                        $calendar.= '<td class="cal-check-T " ><a href="'.$this_->createUrl('competition/view',array('id'=>$competition_dat['id'])).'"> '. $list_day.' ';
                    }
                } elseif ($data == $competition_dat['end_data'] && $competition_dat['type'] == 2 || $data == $competition_dat['start_data'] && $competition_dat['type'] == 2 || $data > $competition_dat['start_data'] && $data < $competition_dat['end_data'] && $competition_dat['type'] == 2) { 
                // Соревнования
                    $next_flag = true;
                    if($todey == $seu_dey){
                         $calendar.= '<td class="cal-check-S cal-selected" ><a href="'.$this_->createUrl('competition/view',array('id'=>$competition_dat['id'])).'"> '. $list_day.' ';   
                    } else {
                        $calendar.= '<td class="cal-check-S " ><a href="'.$this_->createUrl('competition/view',array('id'=>$competition_dat['id'])).'"> '. $list_day.' ';
                    }                    
                }
            }
        }
      
      if(!$next_flag){
          if($todey == $seu_dey){
              $calendar.= '<td class="cal-selected"><a href="#">'. $list_day.'';
          } else {
              $calendar.= '<td><a href="#">'. $list_day.'';
          }          
      }
    
    $calendar.= '</a>';
    if($running_day == 6):
      $calendar.= '</tr>';
      if(($day_counter+1) != $days_in_month):
        $calendar.= '<tr>';
      endif;
      $running_day = -1;
      $days_in_this_week = 0;
    endif;
    $days_in_this_week++; $running_day++; $day_counter++;
  endfor;
  if($days_in_this_week < 8):
    for($x = 1; $x <= (8 - $days_in_this_week); $x++):
      $calendar.= '<td> </td>';
    endfor;
  endif;
  $calendar.= '</tr>';
  $calendar.= '</tbody></table></div>';
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
                                    <?php 
                                    if(Yii::app()->user->isGuest){
//                                        $this->createUrl('user/view',array('id'=>$user_dey_lists['id']));
                                        echo'<a href="'.$this->createUrl('/site/login').'" data-dropdown="profile" data-options="is_hover:true" class="top-user-link" alt="Вход" title="Вход">Войти</a>';
                                    } else {
                                        echo'<a href="'.$this->createUrl('/site/logout').'" class="top-user-link" alt="Выйти" title="Выйти">Выйти</a>';
                                    }
                                    ?>
					<!--<a href="#" data-dropdown="profile" data-options="is_hover:true" class="top-user-link" alt="Вход" title="Вход">Войти</a>-->
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
//				array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
//				array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Новости', 'url'=>array('/events/news')),
                                array('label'=>'Соревнования', 'url'=>array('/competition/index')),
                                array('label'=>'Тренировки', 'url'=>array('/competition/training')),
                                array('label'=>'Статьи', 'url'=>array('/events/article')),
                                array('label'=>'Члены клуба', 'url'=>array('/user/index')),
                                array('label'=>'Ссылки', 'url'=>array('/link/index')),
                                array('label'=>'Регистрация', 'url'=>array('/user/registration')),
                                array('label'=>'Фото-галерея', 'url'=>array('/photo/galery')),
//				array('label'=>'Онас', 'url'=>array('/site/page', 'view'=>'about')),
//				array('label'=>'Контакты', 'url'=>array('/site/contact')),
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
        
                <div class="slideshow-holder row">
                    <div class="slideshow-wrapper large-8 columns">
                        <div class="preloader"></div>
			<ul data-orbit>
				<li data-orbit-slide="headline-1">
					<img src="sliders/6.jpg" alt="slide image">
				</li>
				<li data-orbit-slide="headline-2">
					<img data-src="sliders/ddddd.jpg" alt="slide image">
				</li>
				<li data-orbit-slide="headline-3">
					<img data-src="sliders/About-sports-betting-systems2.png" alt="slide image">
				</li>
				<li data-orbit-slide="headline-4">
					<img data-src="sliders/19rtz.png" alt="slide image">
				</li>
			</ul>
			<div class="orbit-headline">
				<a href="#" data-orbit-link="headline-1">«Самариада 2013», с.Васильевка, 28 — 30 июля</a>
				<a href="#" data-orbit-link="headline-2">«Самариада 2013», с.Васильевка, 28 — 30 июля</a>
				<a href="#" data-orbit-link="headline-3">«Самариада 2013», с.Васильевка, 28 — 30 июля</a>
				<a href="#" data-orbit-link="headline-4">«Самариада 2013», с.Васильевка, 28 — 30 июля</a>
                        </div>
                    </div>
                </div>
        
        
        
        
        <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>


	<div class="calendar">
            <?php
               $mass_data = explode('-', date('m-Y'));
               echo draw_new_calendar($mass_data[0],$mass_data[1],$this);
            ?>
        </div>
                
        <div class='banners'>        
<!--            <div id="banner-content" class="large-4 small-12 columns">
		<div class="row">
                    <div class="small-12 columns">-->
                        <?php
                        echo Banners::getAllBanners();
                        ?>
<!--                    </div>
                </div>
            </div>-->
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
