<?php
/* Функция генерации календаря */

function draw_new_calendar($month, $year, $this_) {
    /* Начало таблицы */
    $mass_data = explode('-', date('m-Y'));
    $calendar = '<div class="cal">
<table class="cal-table"><caption class="cal-caption">
' . get_mont($mass_data[0]) . ' ' . $mass_data[1] . '
</caption>
<tbody class="cal-body">';
    /* Заглавия в таблице */
    $headings = array('Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс');
    $calendar.= '<tr><td class="">' . implode('</td><td class="">', $headings) . '</td></tr>';
    /* необходимые переменные дней и недель... */
    $running_day = date('w', mktime(0, 0, 0, $month, 1, $year));
    $running_day = $running_day - 1;
    $days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
    $days_in_this_week = 1;
    $day_counter = 0;
    $dates_array = array();
    /* первая строка календаря
     *
     *
     * <tr><td class="cal-off"><a href="#">30</a></td>
     *
     * */
    $calendar.= '<tr>';
    /* вывод пустых ячеек в сетке календаря */
    for ($x = 0; $x < $running_day; $x++):
        $calendar.= '<td class="cal-off"><a href="#"> - </a></td>';
        $days_in_this_week++;
    endfor;
    $user = User::model()->findAll('status=:status AND member=:member', array(':status' => 1, ':member' => 1));
    $user_dey_list = array();
    foreach ($user as $users) {
        $mas_data = explode('-', $users->data_birth);
        $user_dey_list[$users->id]['data'] = $mas_data[1] . '-' . $mas_data[2];
        $user_dey_list[$users->id]['id'] = $users->id;
    }
    $competition = Competition::model()->findAll();
    $competition_data = array();
    foreach ($competition as $competitions) {
        $start_data = explode('-', $competitions->start_data);
        $end_data = explode('-', $competitions->end_data);
        $competition_data[$competitions->id]['start_data'] = $start_data[1] . '-' . $start_data[2];
        $competition_data[$competitions->id]['end_data'] = $end_data[1] . '-' . $end_data[2];
        $competition_data[$competitions->id]['type'] = $competitions->type;
        $competition_data[$competitions->id]['id'] = $competitions->id;
    }
    for ($list_day = 1; $list_day <= $days_in_month; $list_day++):
        if ($list_day < 10) {
            $data = $month . '-0' . $list_day;
            $seu_dey = '0' . $list_day;
        } else {
            $data = $month . '-' . $list_day;
            $seu_dey = $list_day;
        }
        $todey = date('d');
        $this_day = 0;
        $flag = false;
        $next_flag = false;
        foreach ($user_dey_list as $user_dey_lists) {
            if ($data == $user_dey_lists['data']) {
                $this_day = $list_day;
                $flag = true;
                $next_flag = true;
                if ($todey == $seu_dey) {
                    $calendar.= '<td class="cal-check-U cal-selected" ><a href="' . $this_->createUrl('user/view', array('id' => $user_dey_lists['id'])) . '"> ' . $list_day . ' ';
                } else {
                    $calendar.= '<td class="cal-check-U" ><a href="' . $this_->createUrl('user/view', array('id' => $user_dey_lists['id'])) . '"> ' . $list_day . ' ';
                }
            }
        }
        $count_competition = count($competition_data);
        if ($flag) {
            
        } else {
            foreach ($competition_data as $competition_dat) {
                $str = $competition_dat['start_data'];
                if ($this_day != $list_day  && ($data == $competition_dat['end_data'] && $competition_dat['type'] == 1 || $data == $competition_dat['start_data'] && $competition_dat['type'] == 1 || $data > $competition_dat['start_data'] && $data < $competition_dat['end_data'] && $competition_dat['type'] == 1)) {
// Тренировка
                    $next_flag = true;
                    $this_day = $list_day;
                    if ($todey == $seu_dey) {
                        $calendar.= '<td class="cal-check-T cal-selected" ><a href="' . $this_->createUrl('competition/view', array('id' => $competition_dat['id'])) . '"> ' . $list_day . ' ';
                    } else {
                        $calendar.= '<td class="cal-check-T " ><a href="' . $this_->createUrl('competition/view', array('id' => $competition_dat['id'])) . '"> ' . $list_day . ' ';
                    }
                } elseif ($this_day != $list_day  && ($data == $competition_dat['end_data'] && $competition_dat['type'] == 2 || $data == $competition_dat['start_data'] && $competition_dat['type'] == 2 || $data > $competition_dat['start_data'] && $data < $competition_dat['end_data'] && $competition_dat['type'] == 2)) {
// Соревнования
                    $next_flag = true;
                    $this_day = $list_day;
                    if ($todey == $seu_dey) {
                        $calendar.= '<td class="cal-check-S cal-selected" ><a href="' . $this_->createUrl('competition/view', array('id' => $competition_dat['id'])) . '"> ' . $list_day . ' ';
                    } else {
                        $calendar.= '<td class="cal-check-S " ><a href="' . $this_->createUrl('competition/view', array('id' => $competition_dat['id'])) . '"> ' . $list_day . ' ';
                    }
                }
            }
        }
        if (!$next_flag) {
            if ($todey == $seu_dey) {
                $calendar.= '<td class="cal-selected"><a href="#">' . $list_day . '';
            } else {
                $calendar.= '<td><a href="#">' . $list_day . '';
            }
        }
        $calendar.= '</a>';
        if ($running_day == 6):
            $calendar.= '</tr>';
            if (($day_counter + 1) != $days_in_month):
                $calendar.= '<tr>';
            endif;
            $running_day = -1;
            $days_in_this_week = 0;
        endif;
        $days_in_this_week++;
        $running_day++;
        $day_counter++;
    endfor;
    if ($days_in_this_week < 8):
        for ($x = 1; $x <= (8 - $days_in_this_week); $x++):
            $calendar.= '<td> </td>';
        endfor;
    endif;
    $calendar.= '</tr>';
    $calendar.= '</tbody></table></div>';
    return $calendar;
}

function get_mont($mont) {
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
    foreach ($monts_array as $k => $v) {
        if ($mont == $k) {
            return $v;
        }
    }
}
?>
<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicons/apple-touch-icon-144x144-precomposed.png"/>
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicons/apple-touch-icon-114x114-precomposed.png"/>
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicons/apple-touch-icon-72x72-precomposed.png"/>
        <link rel="apple-touch-icon-precomposed" href="img/favicons/apple-touch-icon-precomposed.png"/>
        <link rel="icon" href="img/favicons/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sliders.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/lib/jquery-1.10.1.min.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.7.2.min.js" type="text/javascript"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/lib/jquery-1.10.1.min.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation.min.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.interchange.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.abide.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.dropdown.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.placeholder.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.forms.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.alerts.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.magellan.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.reveal.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.tooltips.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.clearing.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.cookie.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.joyride.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.orbit.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.section.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.topbar.js"></script>
        <script type="text/javascript"  src="<?php echo Yii::app()->request->baseUrl; ?>/js/holder.js"></script>
        <title>Клуб спортивного орієнтування «Компас» м.Харків</title>
        <!--<title><?php // echo CHtml::encode($this->pageTitle);  ?></title>-->
    </head>
    <body>
        <div id="header">
            <div class="header-top">
                <div class="row">
                    <div class="small-12 columns">
                        <div class="logo small-4 large-3 large-uncentered columns">
                            <a href="<?php echo Yii::app()->homeUrl; ?>" class="">
                                <img id="logo1" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_1.png" alt="«Компас» м.Харків" title="«Компас» м.Харків"/>
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="«Компас» м.Харків" title="«Компас» м.Харків"/>
                            </a>
                        </div>
                        <div class="top-login small-4 large-3 columns">
                            <div class="top-user">
                                <?php
                                if (Yii::app()->user->isGuest) {
                                    echo'<a href="' . $this->createUrl('/site/login') . '" data-dropdown="profile" data-options="is_hover:true" class="top-user-link" alt="Вход" title="Вход">Войти</a>';
                                } else {
                                    echo'<a href="' . $this->createUrl('/site/logout') . '" class="top-user-link" alt="Выйти" title="Выйти">Выйти</a>';
                                }
                                ?>
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
                            <div class="first-my timerhello">
                                <div class="first-my-content">
						<p class="titloftimer">До ближайшего события:</p> 
						<p class="titles">
							<span class="dd">дней</span>
							<span class="hh">часов</span>
							<span class="mm">минут</span>
							<span class="ss">секунд</span>
						</p>
						<p class="result">
							<span style="color: rgb(0, 0, 0);" class="result-day">59</span>
							<span style="color: rgb(0, 0, 0);" class="result-hour">01</span>  
							<span style="color: rgb(0, 0, 0);" class="result-minute">16</span>
							<span style="color: rgb(0, 0, 0);" class="result-second">11</span> 
						</p> 
						<div class="clear"></div>

				</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="top-nav">
            <div id="mainmenu">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => array(
                        array('label' => 'Главная', 'url' => array('/site/index')),
// array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
// array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                        array('label' => 'Новости', 'url' => array('/events/news')),
                        array('label' => 'Соревнования', 'url' => array('/competition/index')),
                        array('label' => 'Тренировки', 'url' => array('/competition/training')),
                        array('label' => 'Статьи', 'url' => array('/events/article')),
                        array('label' => 'Члены клуба', 'url' => array('/user/index')),
                        array('label' => 'Ссылки', 'url' => array('/link/index')),
                        array('label' => 'Регистрация', 'url' => array('/user/registration')),
                        array('label' => 'Фото-галерея', 'url' => array('/photo/galery')),
// array('label'=>'Онас', 'url'=>array('/site/page', 'view'=>'about')),
// array('label'=>'Контакты', 'url'=>array('/site/contact')),
                    ),
                ));
                ?>	
            </div>
        </div>
        
        
        
        
        <?php
            $sliders = Sliders::model()->findAll();
            $images_sliders = '<ul data-orbit>';
            $headline_sliders = '<div class="orbit-headline">';
            $i = 0;
            foreach ($sliders as $slider) {
                $i++;
               $headline_sliders .= '<a href="#" data-orbit-link="headline-'.$i.'"> --- '.$i.' --- </a>';
               $images_sliders .= '<li data-orbit-slide="headline-'.$i.'">'; 
               $images_sliders .= ' <img src="/sliders/' . $slider->path . '" width="640" height="360"/>'; 
               $images_sliders .= '</li>'; 
            }
            $images_sliders .= '</ul>';
            $headline_sliders .= '</div>';
        ?>
        
        
        <div class="slideshow-holder row">            
            <div class="slideshow-wrapper large-8 columns">
                <?php
                        $request = Yii::app()->request->requestUri;
                        if ($sliders != NULL) {
                            if ($request == '/' || $request == '/index.php/site/index' || $request == '/index.php' ) {
//                                echo $images_sliders;
//                                echo $headline_sliders;
                            }
                        }
                ?>
<?php if (isset($this->breadcrumbs)): $this->widget('zii.widgets.CBreadcrumbs', array('links' => $this->breadcrumbs)); endif ?>
            </div>
            <div class="cal large-4 columns">
                <?php 
                    if ($request == '/' || $request == '/index.php/site/index' || $request == '/index.php' ) {
                        $mass_data = explode('-', date('m-Y'));
//                        echo draw_new_calendar($mass_data[0], $mass_data[1], $this);
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <div id="news-content" class="large-8 small-12 columns">
                <div id="page">
                    <div class="row">
                        <div class="section-container">
                            <section>
                                <div class="content" data-section-content>
                                     <?php echo $content; ?>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div id="banner-content" class="large-4 small-12 columns">
                <div class="row">
                    <div class="small-12 columns">
                        <ul class="no-bullet small-block-grid-4 large-block-grid-1">
                    <?php
                         echo Banners::getAllBanners();
                    ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="large-12 columns">
                <div class="quote">
                    <?php
                        $Quote = new Quote();
                        $quote = $Quote->getRandQuote();
                            echo '<blockquote>' . $quote->quote . '<cite> ' . $quote->author_quote . '</cite></blockquote>';
                    ?>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="row">
                <div class="large-12 small-11 columns">
                    <div class="large-4 columns">
                        <ul class="no-bullet left">
                            <li><a href="/index.php/competition/index">Соревнования</a></li>
                            <li><a href="/index.php/competition/training">Тренировки</a></li>
                            <li><a href="/index.php/events/article">Статьи</a></li>
                            <li><a href="/index.php/user/index">Члены клуба</a></li>
                            <li><a href="/index.php/link/index">Ссылки</a></li>
                            <li><a href="/index.php/photo/galery">Фото-галлерея</a></li>
                            <!--<li><a href="#">О нас</a></li>-->
                        </ul>
                    </div>
                    <div class="large-4 columns">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                    <div class="large-4 columns">
                        <script type="text/javascript" src="//vk.com/js/api/openapi.js?98"></script>
                        <div class="small-12 small-centered large-8 large-centered columns">
                            <!-- VK Widget -->
                            <div id="vk_groups"></div>
                            <script type="text/javascript">
//                                 VK.Widgets.Group("vk_groups", {mode: 0, width: "220", height: "200", color1: 'D02B23', color2: 'FFFFFF', color3: 'EA5F58'}, 20003922);
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copy">
                <div class="row">
                    <div class="small-12 columns">
                        <span>&#169; КСО Компас, Харьков 2013</span>
                    </div>
                </div>
            </div>
        </footer>
        <script type="text/javascript">	
            function get_timer(string) {
                var date_new = string;
                var date_t = new Date(date_new);
                var date = new Date();
                var timer = date_t - date;
                if(date_t > date) {	
                    var day = parseInt(timer/(60*60*1000*24));	
                    if(day < 10) {	
                        day = "0" + day;
                    }
                    day = day.toString();
                    var hour = parseInt(timer/(60*60*1000))%24;
                    if(hour < 10) {
                        hour = "0" + hour;
                    }
                    hour = hour.toString();
                    var min = parseInt(timer/(1000*60))%60;
                    if(min < 10) {
                        min = "0" + min;
                    }
                    min = min.toString();
                    var sec = parseInt(timer/1000)%60;
                    if(sec < 10) {
                        sec = "0" + sec;
                    }
                    sec = sec.toString();
                    timethis = day + " : " + hour + " : " + min + " : " + sec;
                    $(".timerhello p.result .result-day").text(day);
                    $(".timerhello p.result .result-hour").text(hour);
                    $(".timerhello p.result .result-minute").text(min);
                    $(".timerhello p.result .result-second").text(sec);
                }
                else {
                    $(".timerhello p.result .result-day").text("00");
                    $(".timerhello p.result .result-hour").text("00");
                    $(".timerhello p.result .result-minute").text("00");
                    $(".timerhello p.result .result-second").text("00");
                }	 }
            
            function getfrominputs(){
                string = "11/10/2014 12:00"; 
                get_timer(string);
                setInterval(function(){
                    get_timer(string);
                },1000);}
            
            $(document).ready(function(){ 
                getfrominputs();
            });	
        </script>
        
        
        
        
        
    </body>
</html>